@extends("layouts.app")

@section('content')

<div class="card mt-5">
    <div class="bg-primary py-3">
        <h2 class="text-white text-center">Lista de usuarios</h2>
    </div>

    <div class="card-body">
        <a href="{{ route('usuarios.create') }}" class="btn btn-success btn-sm mb-3">
            <i class="fa fa-plus"></i> Nuevo Usuario
        </a>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Contraseña (hash)</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->user_name }}</td>
                        <td>{{ $usuario->user_email }}</td>
                        <td>{{ $usuario->role }}</td>
                        <td class="text-truncate" style="max-width: 200px;">{{ $usuario->password }}</td>
                        <td>
                            <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i>View</a>
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
