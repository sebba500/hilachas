<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Log;
Use Carbon\Carbon;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'rut' => ['required'],
            'password' => ['required'],
        ]);

        //  Log::info($credentials["rut"]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/InventarioPrendas');
        }

        return back()->withErrors([
            'email' => 'Las credenciales ingresadas son incorrectas.',
        ]);
    }





    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
