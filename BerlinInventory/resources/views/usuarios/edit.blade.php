@extends("layouts.app")

@section('content')

<div class="card mt-5">
    <div class="bg-primary py-3">
        <h2 class="text-white text-center">Editar Usuario</h2>
    </div>

    <div class="card-body">
        <a href="{{ route('usuarios.index') }}" class="btn btn-info btn-sm mb-3">
            <i class="fa fa-arrow-left"></i> Volver
        </a>

        <div class="mt-4">
            <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mt-2">
                    <label for="">Nombre de Usuario:</label>
                    <input type="text" name="user_name" class="form-control" value="{{ $usuario->user_name }}">
                    @error("user_name")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-2">
                    <label for="">Correo Electrónico:</label>
                    <input type="email" name="user_email" class="form-control" value="{{ $usuario->user_email }}">
                    @error("user_email")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-2">
                    <label for="">Contraseña (opcional):</label>
                    <input type="password" name="password" class="form-control" placeholder="Dejar vacío si no se cambia">
                    @error("password")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-2">
                    <label for="">Rol:</label>
                    <input type="text" name="role" class="form-control" value="{{ $usuario->role }}">
                    @error("role")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-2">
                    <button class="btn btn-success btn-sm" type="submit">
                        <i class="fa fa-save"></i> Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
