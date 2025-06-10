@extends("layouts.app")

@section('content')

<!-- Vite: importar CSS y JS personalizados -->
@vite(['resources/css/usuario-detalle.css', 'resources/js/usuario-detalle.js'])

<!-- AOS y Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


<div class="card mt-5" data-aos="zoom-in">
    <div class="bg-primary py-3">
        <h2 class="text-white text-center">
            <i class="fas fa-user-plus me-2"></i> Registrar Nuevo Usuario
        </h2>
    </div>

    <div class="card-body">
        <a href="{{ route('usuarios.index') }}" class="btn btn-info btn-sm mb-3">
            <i class="fas fa-arrow-left"></i> Volver
        </a>

        <form action="{{ route('usuarios.store') }}" method="POST" data-aos="fade-up">
            @csrf

            <div class="mb-3">
                <label for="user_name" class="form-label">Nombre de usuario:</label>
                <input type="text" id="user_name" name="user_name" placeholder="Ingrese el nombre" 
                       class="form-control @error('user_name') is-invalid @enderror" 
                       value="{{ old('user_name') }}" required autofocus>
                @error("user_name")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="user_email" class="form-label">Correo electrónico:</label>
                <input type="email" id="user_email" name="user_email" placeholder="Ingrese el email" 
                       class="form-control @error('user_email') is-invalid @enderror" 
                       value="{{ old('user_email') }}" required>
                @error("user_email")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Ingrese contraseña" 
                       class="form-control @error('password') is-invalid @enderror" 
                       required minlength="8">
                @error("password")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Rol:</label>
                <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" required>
                    <option value="">Seleccione un rol</option>
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Usuario Normal</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrador</option>
                </select>
                @error("role")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="text-end">
                <button class="btn btn-success btn-sm" type="submit">
                    <i class="fas fa-save"></i> Guardar
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
