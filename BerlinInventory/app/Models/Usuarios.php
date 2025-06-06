<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $fillable = [
        'user_name',
        'user_email',
        'password',
        'role',
    ];

    protected $table = 'usuarios'; // Especificar tabla plural

    public function inventoryLogs()
    {
        return $this->hasMany(InventoryLogs::class, 'user_id');
    }
}
