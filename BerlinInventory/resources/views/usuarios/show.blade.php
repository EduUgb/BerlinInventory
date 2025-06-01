@extends('layouts.app')

@section('content')

<div class="card mt-5">
    <div class="bg-primary py-3">
        <h2 class="text-white text-center">Detalle del Usuario</h2>
    </div>

    <div class="card-body">
        <a href="{{ route('usuarios.index') }}" class="btn btn-info btn-sm mb-3">
            <i class="fa fa-arrow-left"></i> Volver
        </a>

        <div class="mt-4">
            <p><strong>ID:</strong> {{ $usuario->id }}</p>
            <p><strong>Nombre del Usuario:</strong> {{ $usuario->user_name }}</p>
            <p><strong>Correo Electrónico:</strong> {{ $usuario->user_email }}</p>
            <p><strong>Rol:</strong> {{ $usuario->role }}</p>
            <p><strong>Contraseña (hash):</strong> <code>{{ $usuario->password }}</code></p>
        </div>
    </div>
</div>

@endsection
