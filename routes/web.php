<?php

use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Crypt;




use App\Http\Controllers\ProductosTextilesController;
use App\Http\Controllers\MaterialesTextilesController;
use App\Http\Controllers\TiposTejidosController;
use App\Http\Controllers\InstruccionesController;
use App\Http\Controllers\InventarioPrendasController;
use App\Http\Controllers\InventarioMateriasPrimasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ConfigController;
use App\Models\Instruccion;
use App\Models\InventarioPrendas;

Route::get('/', function () {
    return view('login');
})->middleware('auth')->middleware('revalidate');





Route::get('/InventarioPrendas', function () {
    return view('inventario_prendas');
})->middleware('auth');

Route::get('/InventarioMateriasPrimas', function () {
    return view('inventario_materias_primas');
})->middleware('auth');

Route::get('/ListaProductosTextiles', function () {
    return view('productos_textiles');
})->middleware('auth');
Route::get('/ListaMaterialesTextiles', function () {
    return view('materiales_textiles');
})->middleware('auth');
Route::get('/ListaInstrucciones', function () {
    return view('instrucciones');
})->middleware('auth');





Route::get('/config', function () {
    return view('config');
})->middleware('auth');






Route::post('/storeUser', [ConfigController::class, 'storeUser'])->name('config.storeUser');
Route::post('/storePass', [ConfigController::class, 'storePass'])->name('config.storePass');





Route::resource('config', ConfigController::class);
Route::resource('productos_textiles', ProductosTextilesController::class);
Route::resource('materiales_textiles', MaterialesTextilesController::class);
Route::resource('tipos_tejidos', TiposTejidosController::class);
Route::resource('instrucciones', InstruccionesController::class);
Route::resource('inventario_prendas', InventarioPrendasController::class);


Route::get('/getDatosMaterialesTextiles', [MaterialesTextilesController::class, 'getDatosMaterialesTextiles'])->name('getDatosMaterialesTextiles');

Route::get('/getDatosTiposTejidos', [TiposTejidosController::class, 'getDatosTiposTejidos'])->name('getDatosTiposTejidos');
Route::get('/getDatosPorTejido', [TiposTejidosController::class, 'getDatosPorTejido'])->name('getDatosPorTejido');

Route::get('/getDatosProductosTextiles', [ProductosTextilesController::class, 'getDatosProductosTextiles'])->name('getDatosProductosTextiles');
Route::get('/getCantidadProducto', [ProductosTextilesController::class, 'getCantidadProducto'])->name('getCantidadProducto');

Route::get('/getDatosInstrucciones', [InstruccionesController::class, 'getDatosInstrucciones'])->name('getDatosInstrucciones');
Route::get('/getDatosInstruccionesFiltradas', [InstruccionesController::class, 'getDatosInstruccionesFiltradas'])->name('getDatosInstruccionesFiltradas');
Route::get('/getDatosParaInstrucciones', [InstruccionesController::class, 'getDatosParaInstrucciones'])->name('getDatosParaInstrucciones');

Route::get('/getDatosInventarioPrendas', [InventarioPrendasController::class, 'getDatosInventarioPrendas'])->name('getDatosInventarioPrendas');
Route::get('/getDatosParaInventarioPrendas', [InventarioPrendasController::class, 'getDatosParaInventarioPrendas'])->name('getDatosParaInventarioPrendas');
Route::post('/procesarPrenda', [InventarioPrendasController::class, 'procesarPrenda'])->name('procesarPrenda');

Route::get('/getDatosInventarioMateriasPrimas', [InventarioMateriasPrimasController::class, 'getDatosInventarioMateriasPrimas'])->name('getDatosInventarioMateriasPrimas');

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/', [LoginController::class, 'authenticate'])->name('auth.authenticate');

Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
