<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Proveedor;
use App\Models\Producto;
use Illuminate\Http\Request;
use DataTables;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use DB;



class ProductosController extends Controller
{


    public function store(Request $request)
    {

        DB::beginTransaction();

        try {




            $password = Hash::make($request->password);

           
                $producto = Producto::updateOrCreate(
                    ['id' => $request->producto_id],
                    [
                         'codigo' => $request->codigo,'nombre' => $request->nombre, 'detalles' => $request->detalles,  'precio' => $request->precio, 'id_proveedor' => $request->proveedor
                    ]
                );
          

           
                DB::commit();
                return response()->json(['success' => 1]);

        } catch (Exception $e) {
           
            DB::rollBack();

            return response()->json(['success' => 0]);
        }



    }

    public function index(Request $request)
    {

        $user = Auth::user();


        // $usuarios = User::where('id', '!=', $user->id)->get();


        if ($request->ajax()) {
            // $data = User::where('id', '!=', $user->id)->get();

            $data = \DB::table('productos')
                ->leftjoin('proveedores', 'proveedores.id', '=', 'productos.id_proveedor')
                ->select('productos.id', 'productos.codigo', 'productos.nombre', 'productos.detalles', 'productos.precio', 'proveedores.nombre as nombre_proveedor')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProducto" style="color:white; margin-right:5px; margin-top:5px;margin-bottom:5px" id="boton-editar' . $row->id . '">Editar &nbsp;<i class="icon-pencil ">&nbsp;</i></a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . ' data-original-title="Delete" class="btn btn-danger btn-sm deleteProducto" style="color:black; margin-right:5px; margin-top:5px;margin-bottom:5px">&nbsp;<i class="icon-trash ">&nbsp;</i></a>';



                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }



        return view('producto');

      
    }


    
    public function getDatosProducto($id)
    {



        $productos = Producto::where('id_proveedor', '=', $id)->get();
       



        return response()->json(['productos' => $productos]);

        //return view('orden_compra_ver')->with('orden_compra',json_encode($orden_compra));
    }
    

    



    public function edit($id)
    {
        $producto = Producto::find($id);
        return response()->json($producto);
    }


    public function destroy($id)
    {
        DB::beginTransaction();

        try {

            $producto= Producto::find($id)->delete();
           

            DB::commit();

            return response()->json(['success' => 'Producto eliminado.']);

        } catch (Exception $e) {
            DB::rollBack();

            return response()->json(['success' => 'error.']);
        }


      
       
       

       
    }
}
