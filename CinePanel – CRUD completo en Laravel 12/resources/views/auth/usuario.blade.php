@extends('layout')
@section('contenido')
    <div class="container d-flex justify-content-center align-items-center vh-80">
        <h1>Registro de Usuario</h1>
    </div>
    <div class="container mt-4">
        <form action="{{ route('guardar.usuario') }}" method="POST">
            @csrf
            <div class="md-5 mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="name" name="nombre" required value="{{ old('nombre') ?? null}}">
            </div>
            @error('nombre')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="md-5 mb-6">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') ?? null}}">
            </div>
            @error('email')
                <div class="text-danger">{{ $message }}</div>

            @enderror
            <div class="md-5 mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <label for="password_confirmation" class="form-label">Confirm Password:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            @error('password')
                <div class="text-danger">{{ $message }}</div>

            @enderror
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
@endsection
