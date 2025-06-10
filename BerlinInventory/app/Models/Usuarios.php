<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;  // ← Extiende esta clase
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Authenticatable  // ← Cambia el nombre de la clase a Usuarios
{
    protected $fillable = [
        'user_name',
        'user_email',
        'password',
        'role',
    ];

    protected $table = 'usuarios'; // Especificar tabla plural


    //Authentication
    public function getAuthIdentifierName()
    {
        return 'user_email';
    }

    public function inventoryLogs()
    {
        return $this->hasMany(InventoryLogs::class, 'user_id');
    }
}
