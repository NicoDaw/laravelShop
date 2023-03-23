<?php

use App\Http\Controllers\ProfileController;
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
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
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

require __DIR__ . '/auth.php';
