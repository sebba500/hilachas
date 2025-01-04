<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\MaterialTextil;
use App\Models\TipoTejido;
use App\Models\Instruccion;

use Illuminate\Http\Request;
use DataTables;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;

class InstruccionesController extends Controller
{
    public function index(Request $request)
    {


        if ($request->ajax()) {


            $data = \DB::table('instrucciones')
                ->leftJoin('tipos_tejidos', 'tipos_tejidos.id', '=', 'instrucciones.id_tipo_tejido')
                ->leftJoin('materiales_textiles', 'materiales_textiles.id', '=', 'instrucciones.id_material_textil')
                ->select(
                    'instrucciones.id',
                    'instrucciones.instrucciones',
                    'tipos_tejidos.nombre as nombre_tipo_tejido',
                    'tipos_tejidos.id as id_tipo_tejido',
                    'materiales_textiles.nombre as nombre_materiales_textiles',
                    'materiales_textiles.id as id_material_textil'
                )
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {


                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editInstruccion" style="color:white; margin-right:5px; margin-top:5px;margin-bottom:5px" id="boton-editar' . $row->id . '">Editar &nbsp;<i class="icon-pencil ">&nbsp;</i></a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . ' data-original-title="Delete" class="btn btn-danger btn-sm deleteInstruccion" style="color:black; margin-right:5px; margin-top:5px;margin-bottom:5px">&nbsp;<i class="icon-trash ">&nbsp;</i></a>';



                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    public function store(Request $request)
    {

        DB::beginTransaction();

        try {

            $instruccion = Instruccion::updateOrCreate(
                ['id' => $request->instruccion_id],
                [
                    'id_tipo_tejido' => $request->tipo_tejido,
                    'id_material_textil' => $request->material_textil,
                    'instrucciones' => $request->instruccion
                ]
            );



            DB::commit();
            return response()->json(['success' => 1]);
        } catch (Exception $e) {

            DB::rollBack();

            return response()->json(['success' => 0]);
        }
    }



    public function getDatosInstrucciones(Request $request)
    {




        $instrucciones = Instruccion::get();



        return response()->json(['instrucciones' => $instrucciones]);

        //return view('orden_compra_ver')->with('orden_compra',json_encode($orden_compra));
    }

    public function getDatosParaInstrucciones(Request $request)
    {


        /*   $tipoTejido = $request->input('tipo_tejido');

        $tipos_tejidos = DB::table('tipos_tejidos')
            ->leftJoin('instrucciones', 'tipos_tejidos.id', '=', 'instrucciones.id_tipo_tejido')
            ->whereNull('instrucciones.id')
            ->select('tipos_tejidos.*')
            ->get();

        $materiales_textiles = DB::table('materiales_textiles')
            ->leftJoin('instrucciones', 'materiales_textiles.id', '=', 'instrucciones.id_material_textil')
            ->whereNull('instrucciones.id')
            ->select('materiales_textiles.*')
            ->get(); */

        $tipos_tejidos = TipoTejido::get();
        $materiales_textiles = MaterialTextil::get();



        return response()->json(['tipos_tejidos' => $tipos_tejidos, "materiales_textiles" => $materiales_textiles]);

        //return view('orden_compra_ver')->with('orden_compra',json_encode($orden_compra));
    }


    public function getDatosInstruccionesFiltradas(Request $request)
    {



        $instruccion = Instruccion::where('id_tipo_tejido', $request->datos['id_tipo_tejido'])
            ->where('id_material_textil', $request->datos['id_material_textil'])
            ->select('instrucciones')
            ->first();


        return response()->json(['instrucciones' => $instruccion ? $instruccion->instrucciones : null]);

        //return view('orden_compra_ver')->with('orden_compra',json_encode($orden_compra));
    }

    public function edit($id)
    {
        $instruccion = Instruccion::find($id);
        return response()->json($instruccion);
    }


    public function destroy($id)
    {
        Instruccion::find($id)->delete();

        return response()->json(['success' => 'registro eliminado.']);
    }
}
