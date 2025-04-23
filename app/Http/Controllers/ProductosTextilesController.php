<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\ProductoTextil;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Exception;
class ProductosTextilesController extends Controller
{
    public function store(Request $request)
    {




        ProductoTextil::updateOrCreate(
            ['id' => $request->producto_textil_id],
            [
                'tipo' => $request->tipo, 'detalles' => $request->detalles,
            ]
        );




        return response()->json(['success' => "registro guardado"]);
    }

    public function index(Request $request)
    {

        $user = Auth::user();


        if ($request->ajax()) {


            $data = ProductoTextil::get();



            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a style="color:white; margin-right:5px; margin-top:5px;margin-bottom:5px" href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProductoTextil">Editar &nbsp;<i class="icon-pencil ">&nbsp;</i></a>';

                    $btn = $btn . ' <a style="color:black; margin-right:5px; margin-top:5px;margin-bottom:5px" href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-tipo="' . $row->tipo . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProductoTextil">&nbsp;<i class="icon-trash ">&nbsp;</i></a>';


                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }



        //return view('proveedor', compact('proveedores'));
    }


    public function getDatosProductosTextiles(Request $request)
    {




        $productos_textiles = ProductoTextil::get();



        return response()->json(['productos_textiles' => $productos_textiles]);

       
    }

    public function getCantidadProducto(Request $request)
    {
        $idProducto = $request->input('id_producto_textil');

        // Consulta para contar las filas relacionadas
        $cantidad = DB::table('inventario_prendas')
            ->where('id_producto_textil', $idProducto)
            ->where('procesada',0)
            ->count();

        return response()->json(['cantidad' => $cantidad]);
    }


    public function edit($id)
    {
        $producto_textil = ProductoTextil::find($id);
        return response()->json($producto_textil);
    }


    public function destroy($id)
    {
        ProductoTextil::find($id)->delete();

        return response()->json(['success' => 'registro eliminado.']);
    }
}
