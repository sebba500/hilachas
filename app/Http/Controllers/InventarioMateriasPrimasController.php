<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\MaterialTextil;
use App\Models\TipoTejido;
use App\Models\ProductoTextil;
use App\Models\Instruccion;
use App\Models\InventarioPrendas;
use App\Models\InventarioMateriasPrimas;

use Illuminate\Http\Request;
use DataTables;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;


class InventarioMateriasPrimasController extends Controller
{
    public function index(Request $request)
    {


       /*  if ($request->ajax()) {


            $data = \DB::table('inventario_prendas')
                ->leftJoin('productos_textiles', 'productos_textiles.id', '=', 'inventario_prendas.id_producto_textil')
                ->leftJoin('tipos_tejidos', 'tipos_tejidos.id', '=', 'inventario_prendas.id_tipo_tejido')
                ->leftJoin('materiales_textiles', 'materiales_textiles.id', '=', 'inventario_prendas.id_material_textil')
                ->where('procesada', 0)
                ->select(
                    'inventario_prendas.id',
                    'inventario_prendas.origen',
                    'inventario_prendas.color',
                    'productos_textiles.tipo as tipo_producto_textil',
                    'productos_textiles.id as id_producto_textil',
                    'tipos_tejidos.nombre as nombre_tipo_tejido',
                    'tipos_tejidos.id as id_tipo_tejido',
                    'materiales_textiles.nombre as nombre_material_textil',
                    'materiales_textiles.id as id_material_textil'
                )
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {


                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm procesarPrenda" style="color:white; margin-right:5px; margin-top:5px;margin-bottom:5px" id="boton-editar' . $row->id . '">Procesar &nbsp;<i class="icon-wrench">&nbsp;</i></a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deletePrenda" style="color:black; margin-right:5px; margin-top:5px;margin-bottom:5px">&nbsp;<i class="icon-trash ">&nbsp;</i></a>';



                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        } */
    }


   /*  public function store(Request $request)
    {

        DB::beginTransaction();

        try {

            $prenda = InventarioPrendas::updateOrCreate(
                ['id' => $request->prenda_id],
                [
                    'id_producto_textil' => $request->producto_textil,
                    'id_tipo_tejido' => $request->tipo_tejido,
                    'id_material_textil' => $request->material_textil,
                    'origen' => $request->origen,
                    'color' => $request->color,
                    'procesada' => 0
                ]
            );



            DB::commit();
            return response()->json(['success' => 1]);
        } catch (Exception $e) {

            DB::rollBack();

            return response()->json(['success' => 0]);
        }
    } */


    

    public function getDatosInventarioMateriasPrimas(Request $request)
    {


        $materias_primas = \DB::table('inventario_materias_primas')
        ->leftJoin('materiales_textiles', 'materiales_textiles.id', '=', 'inventario_materias_primas.id_material_textil')
        ->select(
            'inventario_materias_primas.id',
            'inventario_materias_primas.color',
            'inventario_materias_primas.color_codigo',
            'inventario_materias_primas.peso',
            'materiales_textiles.nombre as nombre_material_textil',
            'materiales_textiles.id as id_material_textil'
        )
        ->orderBy('materiales_textiles.nombre')
        ->get();

    

        return response()->json($materias_primas);

    }

  

/* 
    public function edit($id)
    {
        $prenda = InventarioPrendas::find($id);
        return response()->json($prenda);
    }


    public function destroy($id)
    {
        InventarioPrendas::find($id)->delete();

        return response()->json(['success' => 'registro eliminado.']);
    }
        
    */
}
