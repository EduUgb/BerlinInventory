<?php

namespace App\Http\Controllers;

use App\Models\Usuarios; // Cambia a tu modelo de Usuario
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
    {
    $usuarios = Usuarios::all(); // Get all users
    return view('usuarios.index', compact('usuarios')); // Pass $usuarios to the view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Usuarios $usuario)
    {
        $validated = $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|email|unique:usuarios,user_email',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

       $usuario::create([
            "user_name" => $request->user_name,
            "user_email" => $request->user_email,
            "password" => bcrypt($request->password), // encriptar la contraseña
            "role" => $request->role,
        ]);{

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }}

    public function create(Usuarios $usuario)
    {
        return view('usuarios.create');
    }

    public function show(string $id)
    {
        $usuario = Usuarios::findOrFail($id); // Encuentra el usuario por ID
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuarios $usuario)
    {
        $validated = $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|email|unique:usuarios,user_email,' . $usuario->id,
            'password' => 'nullable|min:6', // La contraseña es opcional en la actualización
            'role' => 'required'
        ]);

        $data = [
            "user_name" => $request->user_name,
            "user_email" => $request->user_email,
            "role" => $request->role,
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password); // Encriptar la nueva contraseña si se proporciona
        }

        $usuario->update($data);
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function edit(Usuarios $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuarios $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }


        public function showRegisterForm()
    {
        return view('auth.register'); // esto cargará resources/views/auth/register.blade.php
    }
}
