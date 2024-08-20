<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\OrdenCompra;
use App\Models\OrdenCompraProducto;
use App\Models\Proveedor;

use Illuminate\Http\Request;
use DataTables;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

use Intervention\Image\Laravel\Facades\Image;

use App\Mail\OrdenMailable;
use App\Models\Producto;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class OrdenesCompraController extends Controller
{



    public function index(Request $request)
    {


        if ($request->ajax()) {


            $data = \DB::table('ordenes_compra')
                ->leftjoin('proveedores', 'proveedores.id', '=', 'ordenes_compra.id_proveedor')
                ->select('ordenes_compra.id', 'ordenes_compra.numero', 'ordenes_compra.cotizacion', 'ordenes_compra.forma_pago', 'ordenes_compra.estado', 'ordenes_compra.fecha_creacion', 'ordenes_compra.monto_orden', 'proveedores.nombre as nombre_proveedor', 'proveedores.id as id_proveedor')
                ->get();

            $data->transform(function ($item) {
                $item->fecha_creacion = Carbon::parse($item->fecha_creacion)->format('d/m/Y H:i'); // Formato de la fecha
                return $item;
            });



            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {

                    $btn = "";

                    if ($row->estado == 0) {
                        $btn = $btn . '<a style="color:black; margin-right:5px;margin-top:5px;margin-bottom:5px" href="javascript:void(0)" data-toggle="tooltip"  data-id_proveedor="' . $row->id_proveedor . '"  data-original-title="Enviar" class="btn btn-warning btn-sm enviarOrdenCompra">Enviar &nbsp;<i class="icon-envelope-letter ">&nbsp;</i></a>';
                    }
                    $btn = $btn . '<a style="color:black; margin-right:5px; margin-top:5px;margin-bottom:5px" href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '"  data-original-title="VerQR" class="btn btn-success btn-sm verOrdenCompra">Ver &nbsp;<i class="icon-doc ">&nbsp;</i></a>';


                    $btn = $btn . ' <a style="color:black;margin-top:5px;margin-bottom:5px" href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteOrdenCompra">&nbsp;<i class="icon-trash ">&nbsp;</i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }



        //return view('orden_compra', compact('ordenes_compra'));
    }

    /* public function getDatosEmpresa(Request $request)
    {
        $user = Auth::user();

        if ($user->admin == 1) {

            return response()->json(['mutualidad' => Proveedor::get(), 'datos_usuario' => $user]);
        } else {


            $cantidad_ordenes_compra = count(OrdenCompra::where('id_usuario', '=', $user->id)->get());

            if ($cantidad_ordenes_compra >= $suscripcion[0]->cantidad_usuarios) {

                return response()->json(['limite' =>  1]);
            }

            return response()->json(['mutualidad' => Proveedor::where('id_usuario', '=', $user->id)->get(), 'datos_usuario' => $user]);
        }
    } */


    public function guardarOrden(Request $request)
    {
        $items = $request->input('items');


    

        $orden_compra =  OrdenCompra::create([
            'numero' => $request->numero_orden,
            'cotizacion' => $request->cotizacion,
            'forma_pago' => $request->forma_pago,
            'id_proveedor' => $request->proveedor,
            'estado' => "10",
        
        ]); 


        foreach ($items as $item) {
             OrdenCompraProducto::create([
                'id_orden' => $orden_compra->id,
                'id_producto' => $item['id_producto'],
                'cantidad' => $item['cantidad'],
            ]); 
        }




        return response()->json(['message' => "Orden de compra creada"]);
    }

    public function orden_compraQR(Request $request)
    {

        $id = Crypt::decrypt($request->id);

        $orden_compra = OrdenCompra::find($id);


        //return view('orden_compra_qr')->with('qrcode',$qrcode);

        //return view()->json(['url'=>url('/orden_compra_qr')]);

        /* return view('orden_compra_ver', compact('string')); */
        $celular = str_replace('"', "", $orden_compra->celular);
        $fecha_nacimiento = str_replace('"', "", $orden_compra->fecha_nacimiento);

        $edad = Carbon::parse($fecha_nacimiento)->age;

        return view('orden_compra_ver', compact('orden_compra'))->with('celular', $celular)->with('edad', $edad);

        //return view('orden_compra_ver')->with('orden_compra',json_encode($orden_compra));
    }

    public function enviarOrden(Request $request)
    {




        $id_proveedor = $request->input('id_proveedor');
        $proveedor = Proveedor::find($id_proveedor);





        try {
            Mail::to($proveedor->email)->send(new OrdenMailable($proveedor->nombre, storage_path("app/public/orden_compra_1.pdf")));

            // Verifica si hay errores en la cola de correo
            if (count(Mail::failures()) > 0) {
                // Si hay errores, registra los detalles y devuelve una respuesta de error
                Log::error('Error al enviar correo: ' . implode(', ', Mail::failures()));
                return response()->json(['success' => false, 'message' => 'Error al enviar correo', 'errors' => Mail::failures()]);
            }

            // Si no hay errores, devuelve una respuesta de éxito
            return response()->json(['success' => true, 'message' => 'Correo enviado con éxito', 'email' => $proveedor->email]);
        } catch (\Exception $e) {
            // Registra el error en el log
            Log::error('Error al enviar correo: ' . $e->getMessage());

            // Devuelve una respuesta de error
            return response()->json(['success' => false, 'message' => 'Error al enviar correo', 'error' => $e->getMessage()]);
        }
    }




    public function store(Request $request)
    {


        $user = Auth::user();



        if ($user->admin == 1) {
            $id_usuario = $request->id_usuario;
        } else {
            $id_usuario = $user->id;
        }




        $orden_compra_existente = OrdenCompra::find($request->orden_compra_id);


        if ($archivo = $request->file("foto")) {

            $archivo = $request->file("foto");
            $carpeta_destino = "fotos";

            OrdenCompra::updateOrCreate(
                ['id' => $request->orden_compra_id],
                [
                    'rut' => $request->rut,
                    'nombre' => $request->nombre,
                    'fecha_nacimiento' => $request->fecha_nacimiento,
                    'genero' => $request->genero,
                    'mutualidad' => $request->mutualidad,
                    'domicilio' => $request->domicilio,
                    'ciudad' => $request->ciudad,
                    'celular' => $request->celular,
                    'cargo' => $request->cargo,
                    'grupo_sangre' => $request->grupo_sangre,
                    'peso' => $request->peso,
                    'estatura' => $request->estatura,
                    'enfermedad_base' => $request->enfermedad_base,
                    'alergia' => $request->alergia,
                    'medicamento_prescrito' => $request->medicamento_prescrito,
                    'rut_empresa' => $request->rut_empresa,
                    'nombre_empresa' => $request->nombre_empresa,
                    'direccion_empresa' => $request->direccion_empresa,
                    'ciudad_empresa' => $request->ciudad_empresa,
                    'contacto_emergencia' => $request->contacto_emergencia,
                    'cargo_contacto' => $request->cargo_contacto,
                    'fono_emergencia' => $request->fono_emergencia,
                    'observacion' => $request->observacion,
                    'foto' => $archivo->getClientOriginalName(),
                    'id_usuario' => $id_usuario
                ]
            );


            $image_resize = Image::read($archivo);
            $image_resize->scaleDown(height: 500);


            // if ($archivo->move($carpeta_destino, $archivo->getClientOriginalName())) { 
            if ($image_resize->save(public_path('fotos/' . $archivo->getClientOriginalName()))) {


                /* $image_resize = Image::read(public_path('fotos/' . $archivo->getClientOriginalName()));
                $image_resize->scaleDown(height: 500);
                $image_resize->save(public_path('fotos/' . $archivo->getClientOriginalName())); */

                //if para eliminar imagen si se sube otra
                if ($orden_compra_existente) {

                    if (file_exists(public_path('fotos/' . $orden_compra_existente->foto))) {
                        unlink(public_path('fotos/' . $orden_compra_existente->foto));
                    }
                }
            }






            return response()->json(['success' => 1]);
        } else {

            OrdenCompra::updateOrCreate(
                ['id' => $request->orden_compra_id],
                [
                    'rut' => $request->rut,
                    'nombre' => $request->nombre,
                    'fecha_nacimiento' => $request->fecha_nacimiento,
                    'genero' => $request->genero,
                    'mutualidad' => $request->mutualidad,
                    'domicilio' => $request->domicilio,
                    'ciudad' => $request->ciudad,
                    'celular' => $request->celular,
                    'cargo' => $request->cargo,
                    'grupo_sangre' => $request->grupo_sangre,
                    'peso' => $request->peso,
                    'estatura' => $request->estatura,
                    'enfermedad_base' => $request->enfermedad_base,
                    'alergia' => $request->alergia,
                    'medicamento_prescrito' => $request->medicamento_prescrito,
                    'rut_empresa' => $request->rut_empresa,
                    'nombre_empresa' => $request->nombre_empresa,
                    'direccion_empresa' => $request->direccion_empresa,
                    'ciudad_empresa' => $request->ciudad_empresa,
                    'contacto_emergencia' => $request->contacto_emergencia,
                    'cargo_contacto' => $request->cargo_contacto,
                    'fono_emergencia' => $request->fono_emergencia,
                    'observacion' => $request->observacion,
                    'id_usuario' => $id_usuario
                ]
            );

            return response()->json(['success' => 1]);
        }
    }

    public function edit($id)
    {
        $orden_compra = OrdenCompra::find($id);
        return response()->json($orden_compra);
    }


    public function destroy($id)
    {
        OrdenCompra::find($id)->delete();

        return response()->json(['success' => 'OrdenCompra deleted successfully.']);
    }
}
