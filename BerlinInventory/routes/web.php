<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RegisterController;

// RUTAS PARA INVITADOS (guest = NO autenticados)
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Registro (vista y procesamiento)

    Route::post('/register', [UsuarioController::class, 'store'])->name('register.store');
});

// Cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// RUTAS PROTEGIDAS (solo usuarios autenticados)
Route::middleware('auth')->group(function () {
    // Página de bienvenida
    Route::get('/', [ProductController::class, 'welcome']);

    // Productos
    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index')->name('products.index');
        Route::get('/products/create', 'create')->name('products.create');
        Route::post('/products', 'store')->name('products.store');
        Route::get('/products/{product}', 'show')->name('products.show');
        Route::get('/products/{product}/edit', 'edit')->name('products.edit');
        Route::put('/products/{product}', 'update')->name('products.update');
        Route::delete('/products/{product}', 'destroy')->name('products.destroy');
        Route::get('/products/search', 'search')->name('products.search');
    });

    // Usuarios (gestión, solo autenticado)
    Route::resource('usuarios', UsuarioController::class);

    // Exportaciones
    Route::resource('export', ExportController::class);
    Route::get('/exportar', [ExportController::class, '__invoke'])->name('export');
    Route::get('/export/show', [ExportController::class, 'show'])->name('export.show');

    // Dashboard
    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard');
});

// Rutas de registro manual
Route::get('/register', [UsuarioController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/contacto', function() {
    return view('contacto');
});
