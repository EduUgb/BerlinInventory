<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Usuarios;
use App\Models\Products;
use App\Observers\UsuariosObserver;
use App\Observers\ProductsObserver;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Usuarios::observe(UsuariosObserver::class);
        Products::observe(ProductsObserver::class);
    }
}