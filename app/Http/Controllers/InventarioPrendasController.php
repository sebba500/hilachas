<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\MaterialTextil;
use App\Models\TipoTejido;
use App\Models\ProductoTextil;
use App\Models\InventarioPrendas;
use App\Models\InventarioMateriasPrimas;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Exception;

class InventarioPrendasController extends Controller
{
    public function index(Request $request)
    {


        if ($request->ajax()) {


            $data = DB::table('inventario_prendas')
                ->leftJoin('productos_textiles', 'productos_textiles.id', '=', 'inventario_prendas.id_producto_textil')
                ->leftJoin('tipos_tejidos', 'tipos_tejidos.id', '=', 'inventario_prendas.id_tipo_tejido')
                ->leftJoin('materiales_textiles', 'materiales_textiles.id', '=', 'inventario_prendas.id_material_textil')
                ->where('procesada', 0)
                ->select(
                    'inventario_prendas.id',
                    'inventario_prendas.origen',
                    'inventario_prendas.color',
                    'inventario_prendas.color_codigo',
                    'inventario_prendas.estampado',
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


                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Procesar" class="procesar btn btn-success btn-sm procesarPrenda" style="color:white; margin-right:5px; margin-top:5px;margin-bottom:5px" id="boton-procesar' . $row->id . '">Procesar &nbsp;<i class="icon-wrench">&nbsp;</i></a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deletePrenda" style="color:black; margin-right:5px; margin-top:5px;margin-bottom:5px">&nbsp;<i class="icon-trash ">&nbsp;</i></a>';



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

            if (!$request->estampado) {
                $estampado="S.E.";
            }else{
                $estampado=$request->estampado;
            }

            $prenda = InventarioPrendas::updateOrCreate(
                ['id' => $request->prenda_id],
                [
                    'id_producto_textil' => $request->producto_textil,
                    'id_tipo_tejido' => $request->tipo_tejido,
                    'id_material_textil' => $request->material_textil,
                    'origen' => $request->origen,
                    'color' => $request->color,
                    'color_codigo'=>$request->color_codigo,
                    'estampado' => $estampado,
                    'procesada' => 0
                ]
            );



            DB::commit();
            return response()->json(['success' => 1]);
        } catch (Exception $e) {

            DB::rollBack();

            return response()->json(['success' => 0]);
        }
    }


    function procesarPrenda(Request $request)
    {


        $id_prenda = $request->id_prenda;
        $id_material_textil = $request->id_material_textil;
        $peso = $request->peso;
        $color = $request->color;
        $color_codigo = $request->color_codigo;
        $estampado = $request->estampado;

        DB::beginTransaction();

        try {

            // buscar si existe la combinación de color y material textil
            $inventario = InventarioMateriasPrimas::where('id_material_textil', $id_material_textil)
                ->where('color', $color)
                ->where('estampado', $estampado)
                ->first();

            if ($inventario) {
                // si existe, suma el peso
                $inventario->peso += $peso;
                $inventario->save();
            } else {
                // si no existe, crea un nuevo registro
                InventarioMateriasPrimas::create([
                    'id_material_textil' => $id_material_textil,
                    'peso' => $peso,
                    'color' => $color,
                    'color_codigo' => $color_codigo,
                    'estampado' => $estampado,
                ]);
            }

            //actualizar estado de la prenda
            $prenda = InventarioPrendas::updateOrCreate(
                ['id' => $id_prenda],
                [
  
                    'procesada' => 1
                ]
            );



            DB::commit();
            return response()->json(['success' => 1]);
        } catch (Exception $e) {

            DB::rollBack();

            return response()->json(['success' => 0]);
        }



    }

    public function getDatosInventarioPrendas(Request $request)
    {




        $prendas = InventarioPrendas::get();



        return response()->json(['prendas' => $prendas]);
    }

    public function getDatosParaInventarioPrendas(Request $request)
    {


        $productos_textiles = ProductoTextil::get();
        $tipos_tejidos = TipoTejido::get();
        $materiales_textiles = MaterialTextil::get();



        return response()->json(["productos_textiles" => $productos_textiles, 'tipos_tejidos' => $tipos_tejidos, "materiales_textiles" => $materiales_textiles]);

        //return view('orden_compra_ver')->with('orden_compra',json_encode($orden_compra));
    }


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
}
