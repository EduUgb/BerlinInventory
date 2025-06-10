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
        <h2 class="text-white text-center"><i class="fas fa-user-edit me-2"></i>Editar Usuario</h2>
    </div>

    <div class="card-body">
        <a href="{{ route('usuarios.index') }}" class="btn btn-info btn-sm mb-3">
            <i class="fas fa-arrow-left"></i> Volver
        </a>

        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" data-aos="fade-right">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nombre de Usuario:</label>
                <input type="text" name="user_name" class="form-control" value="{{ old('user_name', $usuario->user_name) }}">
                @error("user_name")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Correo Electrónico:</label>
                <input type="email" name="user_email" class="form-control" value="{{ old('user_email', $usuario->user_email) }}">
                @error("user_email")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña (opcional):</label>
                <input type="password" name="password" class="form-control" placeholder="Dejar vacío si no se cambia">
                @error("password")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Rol:</label>
                <input type="text" name="role" class="form-control" value="{{ old('role', $usuario->role) }}">
                @error("role")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button class="btn btn-success btn-sm" type="submit">
                <i class="fas fa-save"></i> Guardar Cambios
            </button>
        </form>
    </div>
</div>

@endsection
