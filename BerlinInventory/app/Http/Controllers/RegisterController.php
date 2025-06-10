<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios; // Asegúrate de que el modelo se llama así
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|email|unique:usuarios,user_email',
            'password' => 'required|min:6',
        ]);

        Usuarios::create([
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'password' => Hash::make($request->password),
            'role' => 'cliente', // O cualquier valor por defecto
        ]);

        return redirect()->route('login')->with('success', 'Usuario registrado correctamente.');
    }
}
