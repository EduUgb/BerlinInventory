<?php

namespace App\Observers;

use App\Models\Products;
use App\Models\InventoryLogs;

class ProductsObserver
{
    public function created(Products $product)
    {
        InventoryLogs::create([
            'user_id' => auth()->id() ?? 1, // Considera un usuario por defecto si no hay nadie logueado
            'prod_id' => $product->id,
            'action' => 'create',
            
            'old_data' => null, // Debería ser null (no string 'null')
            'new_data' => json_encode($product->toArray())
        ]);
    }

    public function updated(Products $product)
    {
        InventoryLogs::create([
            'user_id' => auth()->id() ?? 1,
            'prod_id' => $product->id,
            'action' => 'update',
            'old_data' => json_encode($product->getOriginal()),
            'new_data' => json_encode($product->toArray())
        ]);
    }

    public function deleted(Products $product)
    {
        InventoryLogs::create([
            'user_id' => auth()->id() ?? 1,
            'prod_id' => $product->id,
            'action' => 'delete',
            'old_data' => json_encode($product->toArray()), // Al borrar, el 'old_data' es el producto completo antes de eliminar
            'new_data' => 'null' // Debería ser null (no string 'null')
        ]);
    }
}