<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productoController;
use App\Models\Categorias;
use App\Models\Producto;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $objetoProducto = Producto::orderBy('precio', 'asc')->get();
    return view('index', ['objetoProducto' => $objetoProducto]);
});
Route::get('/añadirProductoPage', function () {
    $categorias = Categorias::all();
    return view('addProduct', ['categorias' => $categorias]);
});
Route::get('/productos', [productoController::class, 'pintaProductos']);
Route::post('/añadirProducto', [productoController::class, 'addProduct']);
Route::get('/añadirCategoriaPage', [productoController::class, 'añadirCategoria']);
Route::get('/eliminarCategoria/{id}', [productoController::class, 'eliminarCat']);
Route::post('/añadirCategoria', [productoController::class, 'addCategory']);
Route::get('/eliminarProductos', [productoController::class, 'eliminarProducto']);
Route::get('/editarProductosPage/{id}', [productoController::class, 'editarProducto']);
Route::post('/actualizarProducto/{id}', [productoController::class, 'updateProduct']);
Route::get('/eliminarProducto/{id}', [productoController::class, 'deleteProduct']);
Route::get('/loginPage', function () {
    return view('loginPage');
});
