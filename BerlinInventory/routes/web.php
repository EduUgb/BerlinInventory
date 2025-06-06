<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ExportController;

Route::get('/', [ProductController::class, 'welcome']);


// Para productos
Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/create', 'create')->name('products.create');
    Route::post('/products', 'store')->name('products.store');
    Route::get('/products/{product}', 'show')->name('products.show');
    Route::get('/products/{product}/edit', 'edit')->name('products.edit');
    Route::put('/products/{product}', 'update')->name('products.update');
    Route::delete('/products/{product}', 'destroy')->name('products.destroy');
    Route::get('/products/search', 'search')->name('products.search'); // Nombre corregido
});

// Reemplaza todo el grupo de rutas de usuarios con:
Route::resource('usuarios', UsuarioController::class);

Route::resource('export', ExportController::class);

// Para exportar logs
Route::get('/exportar', ExportController::class)->name('export'); // Cambiado a /exportar
Route::view('/export', 'export.export'); // Ruta para mostrar el formulario
Route::get('/export/show', [ExportController::class, 'show'])->name('export.show');