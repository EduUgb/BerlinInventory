@extends('layouts.app')

@section('content')

<div class="card mt-5">
    <div class="bg-primary py-3">
        <h2 class="text-white text-center">Lista de Usuarios</h2>
    </div>

    <div class="card-body">
        <a href="{{ route('usuarios.create') }}" class="btn btn-success btn-sm mb-3">
            <i class="fa fa-plus"></i> Crear Usuario
        </a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if ($usuarios->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center">
                            <div class="alert alert-info">No hay usuarios registrados</div>
                        </td>
                    </tr>
                @else
                    @foreach ($usuarios as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->user_name }}</td>
                            <td>{{ $user->user_email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('usuarios.show', $user->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i> Ver
                                    </a>
                                    <a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-pencil"></i> Editar
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection