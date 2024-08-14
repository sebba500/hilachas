<?php

use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Crypt;



use App\Http\Controllers\OrdenesCompraController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\ConfigController;
use App\Models\OrdenCompra;





Route::get('/', function () {
    return view('login');
})->middleware('auth')->middleware('revalidate');

Route::get('/ListaOrdenesCompra', function () {

    $items = array();
    $data[0]['nombre'] = 'producto 1';
    $data[0]['precio'] = '1000';

    $data[1]['nombre'] = 'producto 2';
    $data[1]['precio'] = '2000';


    return view('orden_compra')->with('items', $items);
})->middleware('auth');

Route::get('/ListaProductos', function () {
    return view('producto');
})->middleware('auth');

Route::get('/ListaProveedores', function () {
    return view('proveedor');
})->middleware('auth');

Route::get('/config', function () {
    return view('config');
})->middleware('auth');




Route::get('/orden_compra/{id}', function ($id) {

    $orden_compra = OrdenCompra::find($id);
   
    $headers = [
        'Content-Description' => 'File Transfer',
    ];
 
    $path = storage_path("app/public/orden_compra_1.pdf");
    return response()->file($path,$headers);
    //return view('orden_compra_qr')->with('qrcode', $qrcode)->with('id', $id)->with('rut', $orden_compra->rut)->with('nombre', $orden_compra->nombre);
})->middleware('auth');



Route::get('/orden_compraVer/{id}', [OrdenesCompraController::class, 'orden_compraQR'])->name('orden_compraQR');
Route::post('/enviarOrden', [OrdenesCompraController::class, 'enviarOrden'])->name('ordenesCompra.enviarOrden');


Route::get('/getDatosProveedor', [ProveedoresController::class, 'getDatosProveedor'])->name('getDatosProveedor');


Route::get('/getDatosProducto/{id}', [ProductosController::class, 'getDatosProducto'])->name('getDatosProducto');
Route::post('/agregarProducto', [ProductosController::class, 'agregarProducto'])->name('productos.agregarProducto');

Route::post('/storeUser', [ConfigController::class, 'storeUser'])->name('config.storeUser');
Route::post('/storePass', [ConfigController::class, 'storePass'])->name('config.storePass');






Route::resource('ordenes_compra', OrdenesCompraController::class);
Route::resource('config', ConfigController::class);
Route::resource('productos', ProductosController::class);
Route::resource('proveedores', ProveedoresController::class);


Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/', [LoginController::class, 'authenticate'])->name('auth.authenticate');

Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
