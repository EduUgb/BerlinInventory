<?php

namespace App\Observers;

use App\Models\Usuarios;
use App\Models\InventoryLogs;

class UsuariosObserver
{
    public function created(Usuarios $usuario)
    {
        InventoryLogs::create([
            'user_id' => auth()->id() ?? 1,
            'prod_id' => 'null',
            'action' => 'create',
            'old_data' => 'null',
            'new_data' => json_encode($usuario->toArray()),
            'created_at' => now(),
            'updated_at' => now()

        ]);
    }

    public function updated(Usuarios $usuario)
    {
        InventoryLogs::create([
            'user_id' => auth()->id() ?? 1,
            'prod_id' => 'null',
            'action' => 'update',
            'old_data' => json_encode($usuario->getOriginal()),
            'new_data' => json_encode($usuario->toArray()),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    public function deleted(Usuarios $usuario)
    {
        InventoryLogs::create([
            'user_id' => auth()->id() ?? 1,
            'prod_id' => 'null',
            'action' => 'delete',
            'old_data' => json_encode($usuario->getOriginal()),
            'new_data' => 'null',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}