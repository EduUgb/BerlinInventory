@extends("layouts.app")

@section('content')

<div class="card mt-5">
    <div class="bg-primary py-3">
        <h2 class="text-white text-center">Registrar Nuevo Usuario</h2>
    </div>

    <div class="card-body">
        <a href="{{ route('usuarios.index') }}" class="btn btn-info btn-sm mb-3">
            <i class="fa fa-arrow-left"></i> Volver
        </a>

        <div class="mt-4">
            <form action="{{ route('usuarios.store') }}" method="POST">
                @csrf

                <div class="mt-2">
                    <label for="user_name">Nombre de usuario:</label>
                    <input type="text" id="user_name" name="user_name" placeholder="Ingrese el nombre" 
                           class="form-control @error('user_name') is-invalid @enderror" 
                           value="{{ old('user_name') }}" required autofocus>
                    @error("user_name")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-2">
                    <label for="user_email">Correo electrónico:</label>
                    <input type="email" id="user_email" name="user_email" placeholder="Ingrese el email" 
                           class="form-control @error('user_email') is-invalid @enderror" 
                           value="{{ old('user_email') }}" required>
                    @error("user_email")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-2">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" placeholder="Ingrese contraseña" 
                           class="form-control @error('password') is-invalid @enderror" 
                           required minlength="8">
                    @error("password")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-2">
                    <label for="role">Rol:</label>
                    <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" required>
                        <option value="">Seleccione un rol</option>
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Usuario Normal</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrador</option>
                    </select>
                    @error("role")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-3">
                    <button class="btn btn-success btn-sm" type="submit">
                        <i class="fa fa-save"></i> Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

