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

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Exception;


class InventarioMateriasPrimasController extends Controller
{
    public function index(Request $request)
    {


     
    }


   

    

    public function getDatosInventarioMateriasPrimas(Request $request)
    {


        $materias_primas = DB::table('inventario_materias_primas')
        ->leftJoin('materiales_textiles', 'materiales_textiles.id', '=', 'inventario_materias_primas.id_material_textil')
        ->select(
            'inventario_materias_primas.id',
            'inventario_materias_primas.color',
            'inventario_materias_primas.color_codigo',
            'inventario_materias_primas.estampado',
            'inventario_materias_primas.peso',
            'materiales_textiles.nombre as nombre_material_textil',
            'materiales_textiles.id as id_material_textil'
        )
        ->orderBy('materiales_textiles.nombre')
        ->get();

    

        return response()->json($materias_primas);

    }

  


}
