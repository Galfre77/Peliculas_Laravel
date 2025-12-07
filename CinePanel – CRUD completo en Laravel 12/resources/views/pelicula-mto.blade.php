@extends('layout')

@section('contenido')
<section id="contenido">
    <div class="container animated fadeIn slow">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card">
                    <form id="formulario" action="{{ route('pelicula.mto', $pelicula) }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')

                        @if (session('success') && is_array(session('success')) && isset(session('success')['aviso']))
                            <div class="alert alert-success">
                                {{ session('success')['aviso'] }}
                            </div>
                        @endif

                        @if ($pelicula)
                        <div class="card-body">

                            <div class="mb-3">
                                <label class="form-label">Título</label>
                                <input name="titulo" type="text" class="form-control" value="{{ $pelicula->titulo }}">
                                @error('titulo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Dirección</label>
                                <input name="direccion" class="form-control" value="{{ $pelicula->direccion }}">
                                @error('direccion')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Año</label>
                                <input name="año" type="number" class="form-control" min="2000" max="2025" value="{{ $pelicula->año }}">
                                @error('año')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Sinopsis</label>
                                <textarea rows="5" class="form-control" name="sinopsis">{{ $pelicula->sinopsis }}</textarea>
                                @error('sinopsis')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Portada</label>
                                <input type="file" class="form-control" name="portada" id="portada" accept="image/*">
                                @error('portada')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            @auth
                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    <button type="submit" class="btn btn-warning" onclick="enviarForm('PUT')">Modificar película</button>
                                    <button type="button" class="btn btn-danger" onclick="enviarForm('DELETE')">Baja película</button>
                                </div>
                            @endauth

                            <a href="{{ route('vista.peliculas') }}" class="btn btn-outline-primary float-end">Volver a listado</a>
                        </div>
                        @else
                            <div class="card-body">
                                <h4>No existe la película</h4>
                            </div>
                        @endif
                    </form>
                </div>
            </div>

            <div class="col-12 col-lg-4 mt-4 mt-lg-0">
                <img src="{{ asset('img/' . $pelicula->portada) }}" alt="previsualizar" id="previsualizar" class="img-fluid rounded border">
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('/js/enviar.js') }}"></script>
@endsection
