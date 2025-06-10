@extends("layouts.app")

@section('content')

<!-- Vite: importar CSS y JS personalizados -->
@vite(['resources/css/usuario-detalle.css', 'resources/js/usuario-detalle.js'])

<!-- AOS y Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<div class="card mt-5" data-aos="fade-up">
    <div class="bg-primary py-3">
        <h2 class="text-white text-center"><i class="fas fa-users me-2"></i>Lista de Usuarios</h2>
    </div>

    <div class="card-body">
        <a href="{{ url('/') }}" class="btn btn-info btn-sm mb-3">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
        <a href="{{ route('usuarios.create') }}" class="btn btn-success btn-sm mb-3">
            <i class="fas fa-user-plus"></i> Nuevo Usuario
        </a>

        @if ($usuarios->isEmpty())
            <div class="alert alert-info" data-aos="fade-in">No hay usuarios registrados.</div>
        @else
            <div class="table-responsive" data-aos="fade-up">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
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
                            <tr data-aos="fade-right">
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->user_name }}</td>
                                <td>{{ $usuario->user_email }}</td>
                                <td>{{ $usuario->role }}</td>
                                <td class="text-truncate" style="max-width: 200px;">
                                    <code>{{ $usuario->password }}</code>
                                </td>
                                <td>
                                    <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-primary btn-sm mb-1">
                                        <i class="fas fa-eye"></i> Ver
                                    </a>
                                    <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-info btn-sm mb-1">
                                        <i class="fas fa-pencil-alt"></i> Editar
                                    </a>
                                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

@endsection
