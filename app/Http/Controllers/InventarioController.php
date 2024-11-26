<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\OrdenCompra;
use App\Models\OrdenCompraProducto;
use App\Models\Proveedor;
use App\Models\Producto;

use Illuminate\Http\Request;
use DataTables;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

use Intervention\Image\Laravel\Facades\Image;

use App\Mail\OrdenMailable;

use Illuminate\Support\Facades\Mail;
use Log;

class InventarioController extends Controller
{
    public function index(Request $request)
    {


        if ($request->ajax()) {


            $data = \DB::table('ordenes_compra')
                ->leftJoin('proveedores', 'proveedores.id', '=', 'ordenes_compra.id_proveedor')
                ->leftJoin('ordenes_compra_productos', 'ordenes_compra_productos.id_orden', '=', 'ordenes_compra.id')
                ->leftJoin('productos', 'productos.id', '=', 'ordenes_compra_productos.id_producto')
                ->select(
                    'ordenes_compra.id',
                    'ordenes_compra.numero',
                    'ordenes_compra.cotizacion',
                    'ordenes_compra.forma_pago',
                    'ordenes_compra.estado',
                    'ordenes_compra.created_at as fecha_creacion',
                    'proveedores.nombre as nombre_proveedor',
                    'proveedores.id as id_proveedor',
                    \DB::raw('SUM(ordenes_compra_productos.cantidad * productos.precio) as monto_orden') // Supuesto de cálculo del monto total
                )
                ->groupBy(
                    'ordenes_compra.id',
                    'ordenes_compra.numero',
                    'ordenes_compra.cotizacion',
                    'ordenes_compra.forma_pago',
                    'ordenes_compra.estado',
                    'ordenes_compra.created_at',
                    'proveedores.id',
                    'proveedores.nombre'
                )
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
                        $btn = $btn . '<a style="color:black; margin-right:5px;margin-top:5px;margin-bottom:5px" href="javascript:void(0)" data-toggle="tooltip"  data-id_proveedor="' . $row->id_proveedor . '" data-id_orden="' . $row->id . '"  data-original-title="Enviar" class="btn btn-warning btn-sm enviarOrdenCompra">Enviar &nbsp;<i class="icon-envelope-letter ">&nbsp;</i></a>';
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
}
