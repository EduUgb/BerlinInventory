@extends('layouts.app')

@section('content')
@vite(['resources/css/login.css'])
<div class="d-flex justify-content-center align-items-center vh-100">
    <form method="POST" action="{{ route('register.store') }}" class="form">
        @csrf
        <p id="heading">Registrarse</p>

        {{-- Nombre --}}
        <div class="field">
            <input type="text" name="user_name" placeholder="Nombre" class="input-field @error('user_name') is-invalid @enderror" value="{{ old('user_name') }}" required>
        </div>
        @error('user_name')
            <span class="invalid-feedback d-block text-danger">{{ $message }}</span>
        @enderror

        {{-- Correo --}}
        <div class="field">
            <input type="email" name="user_email" placeholder="Correo Electrónico" class="input-field @error('user_email') is-invalid @enderror" value="{{ old('user_email') }}" required>
        </div>
        @error('user_email')
            <span class="invalid-feedback d-block text-danger">{{ $message }}</span>
        @enderror

        {{-- Contraseña --}}
        <div class="field">
            <input type="password" name="password" placeholder="Contraseña" class="input-field @error('password') is-invalid @enderror" required>
        </div>
        @error('password')
            <span class="invalid-feedback d-block text-danger">{{ $message }}</span>
        @enderror

        {{-- Rol --}}


        {{-- Botones --}}
        <div class="btn">
            <button type="submit" class="button1">Registrarse</button>
            <a href="{{ route('login') }}" class="button2">Iniciar sesión</a>
        </div>

    </form>
</div>
@endsection
