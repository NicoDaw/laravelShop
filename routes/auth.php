<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\productoController;
use Illuminate\Support\Facades\Route;
use App\Models\Categorias;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return redirect()->route('productos');
    });
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
    Route::get('/loginPage', function () {
        return view('loginPage');
    })->name('loginPage');
});
Route::get('/productos', [productoController::class, 'pintaProductos'])->name('productos');
Route::get('/añadirCategoriaPage', [productoController::class, 'añadirCategoria'])->name('categorias');

Route::middleware('auth')->group(function () {
    // Route::get('/productos', [productoController::class, 'pintaProductos'])->name('productos');
    Route::get('/añadirProductoCarrito/{id}', [productoController::class, 'añadeProductoCarrito']);
    Route::get('/añadirProductoPage', function () {
        $categorias = Categorias::all();
        return view('addProduct', ['categorias' => $categorias]);
    });
    Route::post('/añadirProducto', [productoController::class, 'addProduct']);
    Route::get('/eliminarCategoria/{id}', [productoController::class, 'eliminarCat']);
    Route::post('/añadirCategoria', [productoController::class, 'addCategory']);
    Route::get('/eliminarProductos', [productoController::class, 'eliminarProducto'])->name('editarProductos');
    Route::get('/editarProductosPage/{id}', [productoController::class, 'editarProducto']);
    Route::post('/actualizarProducto/{id}', [productoController::class, 'updateProduct']);
    Route::get('/eliminarProducto/{id}', [productoController::class, 'deleteProduct']);
    Route::get('/irCarrito', [productoController::class, 'irCarritoPage'])->name('iracarrito');
    Route::get('/deleteCartItem/{id}', [productoController::class, 'deleteItem']);
    //AUTH ROUTES
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
