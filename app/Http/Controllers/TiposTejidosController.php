<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\TipoTejido;
use Illuminate\Http\Request;
use DataTables;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;

class TiposTejidosController extends Controller
{
    public function store(Request $request)
    {




        /*  MaterialTextil::updateOrCreate(
            ['id' => $request->material_textil_id],
            [
                'nombre' => $request->nombre, 'detalles' => $request->detalles,
            ]
        );




        return response()->json(['success' => "registro guardado"]); */
    }

    public function index(Request $request)
    {

        /*   $user = Auth::user();


        if ($request->ajax()) {


            $data = MaterialTextil::get();



            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a style="color:white; margin-right:5px; margin-top:5px;margin-bottom:5px" href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editMaterialTextil">Editar &nbsp;<i class="icon-pencil ">&nbsp;</i></a>';

                    $btn = $btn . ' <a style="color:black; margin-right:5px; margin-top:5px;margin-bottom:5px" href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-nombre="' . $row->nombre . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteMaterialTextil">&nbsp;<i class="icon-trash ">&nbsp;</i></a>';


                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

 */

        //return view('proveedor', compact('proveedores'));
    }


    public function getDatosTiposTejidos(Request $request)
    {




        $tipos_tejidos = TipoTejido::get();



        return response()->json(['tipos_tejidos' => $tipos_tejidos]);

        //return view('orden_compra_ver')->with('orden_compra',json_encode($orden_compra));
    }

    public function getDatosPorTejido(Request $request)
    {





        $tipos_tejidos = DB::table('tipos_tejidos')
            ->leftJoin('inventario_prendas', 'tipos_tejidos.id', '=', 'inventario_prendas.id_tipo_tejido')
            ->select('tipos_tejidos.id as id_tipo_tejido', 'tipos_tejidos.nombre', DB::raw('COUNT(inventario_prendas.id) as total'))
            ->groupBy('tipos_tejidos.id', 'tipos_tejidos.nombre')
            ->where('inventario_prendas.procesada',0)
            ->get();



        return response()->json(['tipos_tejidos' => $tipos_tejidos]);

        //return view('orden_compra_ver')->with('orden_compra',json_encode($orden_compra));
    }


    /* public function edit($id)
    {
        $material_textil = MaterialTextil::find($id);
        return response()->json($material_textil);
    }


    public function destroy($id)
    {
        MaterialTextil::find($id)->delete();

        return response()->json(['success' => 'registro eliminado.']);
    } */
}
