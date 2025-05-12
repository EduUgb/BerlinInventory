<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class InventoryLogs extends Model
{
    protected $fillable = [
        'user_id',
        'prod_id',
        'action',
        'old_data',
        'new_data',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'user_id');
    }

    public function products()
    {
        return $this->belongsTo(Products::class, 'prod_id');
    }
}
