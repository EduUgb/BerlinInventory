<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class InventoryLogs extends Model
{
    protected $table = 'inventory_logs';
    
    protected $fillable = [
        'user_id', // Asegúrate que esté en fillable
        'prod_id',
        'action',
        'old_data',
        'new_data',
    ];

    // Cambia el tipo de datos para old_data y new_data
    protected $casts = [
        'old_data' => 'json',
        'new_data' => 'json',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'prod_id');
    }
}