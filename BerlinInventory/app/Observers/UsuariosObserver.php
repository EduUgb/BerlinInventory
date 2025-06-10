<?php


namespace App\Observers;

use App\Models\Usuarios;
use App\Models\InventoryLogs;

class UsuariosObserver
{
    public function updated(Usuarios $usuario)
    {
        InventoryLogs::create([
            'user_id' => $usuario->id, // ¡Usa el ID del usuario!
            'prod_id' => null, // O el ID del producto si es relevante para la acción del usuario
            'action' => 'update_user_profile', // Una acción más específica
            'old_data' => json_encode($usuario->getOriginal()),
            'new_data' => json_encode($usuario->toArray()),
        ]);
    }

    // Puedes agregar created y deleted si lo necesitas
    public function created(Usuarios $usuario)
    {
        InventoryLogs::create([
            'user_id' => $usuario->id,
            'prod_id' => null,
            'action' => 'create_user',
            'old_data' => null,
            'new_data' => json_encode($usuario->toArray()),
        ]);
    }

    public function deleted(Usuarios $usuario)
    {
        InventoryLogs::create([
            'user_id' => $usuario->id, // El ID del usuario que fue eliminado
            'prod_id' => null,
            'action' => 'delete_user',
            'old_data' => json_encode($usuario->getOriginal()),
            'new_data' => 'null',
        ]);
    }
}