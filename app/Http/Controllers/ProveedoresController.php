<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use DataTables;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProveedoresController extends Controller
{
    public function store(Request $request)
    {




        Proveedor::updateOrCreate(
            ['id' => $request->proveedor_id],
            [
                'nombre' => $request->nombre, 'rut' => $request->rut,'email' => $request->email, 'direccion' => $request->direccion, 'telefono' => $request->telefono, 'contacto' => $request->contacto,
            ]
        );




        return response()->json(['success' => $request->contacto]);
    }

    public function index(Request $request)
    {

        $user = Auth::user();


        if ($request->ajax()) {


            $data = Proveedor::get();



            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a style="color:white; margin-right:5px; margin-top:5px;margin-bottom:5px" href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editMutualidad">Editar &nbsp;<i class="icon-pencil ">&nbsp;</i></a>';

                    $btn = $btn . ' <a style="color:black; margin-right:5px; margin-top:5px;margin-bottom:5px" href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-nombre="' . $row->nombre . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteMutualidad">&nbsp;<i class="icon-trash ">&nbsp;</i></a>';


                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }



        //return view('proveedor', compact('proveedores'));
    }


    public function getDatosProveedor(Request $request)
    {




        $proveedor = Proveedor::get();



        return response()->json(['proveedores' => $proveedor]);

        //return view('orden_compra_ver')->with('orden_compra',json_encode($orden_compra));
    }


    public function edit($id)
    {
        $proveedor = Proveedor::find($id);
        return response()->json($proveedor);
    }


    public function destroy($id)
    {
        Proveedor::find($id)->delete();

        return response()->json(['success' => 'Mutualidad eliminada.']);
    }
}
