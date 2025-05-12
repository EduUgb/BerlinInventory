<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $fillable = [
        'user_name',
        'user_email',
        'password',
    ];

    public function inventoryLogs()
    {
        return $this->hasMany(InventoryLogs::class, 'user_id');
    }
}
