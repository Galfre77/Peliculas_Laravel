@extends('layout')
@section('contenido')
    <div class="container d-flex justify-content-center align-items-center vh-80">
        <form id="login-form" action="{{ route('login') }}" method="POST">
            @csrf
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
            </div>
            @error('password')
                <div class="text-danger">{{ $message }}</div>

            @enderror
            <button type="submit" class="btn btn-primary">Login</button>
    </div>
    </form>
@endsection
