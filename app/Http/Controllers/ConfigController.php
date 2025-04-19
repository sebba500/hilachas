<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\OrdenCompra;
use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ConfigController extends Controller
{
    public function index(Request $request)
    {

        $user = Auth::user();


        $usuario = User::where('id', '=', $user->id)->get();


        return view('config', compact('usuario'));
    }

    public function getDatosEmpresa(Request $request)
    {
        $user = Auth::user();

        if ($user->tipo == "Administrador") {

            return response()->json(['proveedor' => Proveedor::get(), 'datos_usuario' => $user]);
        } else {

            return response()->json(['proveedor' => Proveedor::where('id_usuario', '=', $user->id)->get(), 'datos_usuario' => $user]);
        }
    }


    public function storeUser(Request $request)
    {

        $user = Auth::user();


        User::updateOrCreate(
            ['id' => $user->id],
            [
                'rut' => $request->rut, 'nombre' => $request->nombre
            ]
        );

        return response()->json(['success' => 'guardado.']);
    }

    public function storePass(Request $request)
    {
        $user = Auth::user();
        $usuario = User::find($user->id);



        $ContraseñaEncriptada = Auth::user()->getAuthPassword();


        if (Hash::check($request->actual_pass, $ContraseñaEncriptada)) {


            if ($request->nueva_pass == $request->nueva_pass_repetir && $request->nueva_pass != "") {
                //todas las contraseñas coinciden y se porcede a guardar

                $password = Hash::make($request->nueva_pass);
        
                User::updateOrCreate(
                    ['id' => $user->id],
                    [
                        'password' => $password
                    ]
                );

                return response()->json(['success' => '2']);
                
            } else {
                //contraseña actual coindicen pero no las nuevas

                return response()->json(['success' => '1']);

            }
            
        } else {
            //contraseñ actual no coindice

            return response()->json(['success' => '0']);
        }
    }
}
