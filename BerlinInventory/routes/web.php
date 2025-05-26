<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('usuarios.index');
});

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

Route::controller(UsuarioController::class)->group(function () {
    Route::get('/usuarios', 'index')->name('usuarios.index');
    Route::get('/usuarios/create', 'create')->name('usuarios.create');
    Route::post('/usuarios', 'store')->name('usuarios.store');
    //Route::get('/usuarios/{usuario}', 'show')->name('usuarios.show');
    //Route::get('/usuarios/{usuario}/edit', 'edit')->name('usuarios.edit');
    //Route::put('/usuarios/{usuario}', 'update')->name('usuarios.update');
    //Route::delete('/usuarios/{usuario}', 'destroy')->name('usuarios.destroy');
});