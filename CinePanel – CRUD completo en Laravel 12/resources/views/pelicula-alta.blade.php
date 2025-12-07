@extends('layout')

@section('contenido')
<section id="contenido">
    <div class="container animated fadeIn slow">
        <div class="row">
            <!-- Formulario -->
            <div class="col-12 col-lg-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pelicula.alta') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Título -->
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Título</label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" name="titulo"
                                   value="{{ old('titulo') ?? $pelicula->titulo ?? '' }}">
                        </div>
                    </div>

                    <!-- Categoría -->
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Categoría</label>
                        <div class="col-sm-10">
                            <select required class="form-control" name="idcategoria">
                                <option value="">Seleccione una categoría</option>
                                <option value="1" {{ (old('idcategoria') ?? $pelicula->idcategoria ?? '') == 1 ? 'selected' : '' }}>Acción</option>
                                <option value="2" {{ (old('idcategoria') ?? $pelicula->idcategoria ?? '') == 2 ? 'selected' : '' }}>Comedia</option>
                                <option value="3" {{ (old('idcategoria') ?? $pelicula->idcategoria ?? '') == 3 ? 'selected' : '' }}>Drama</option>
                                <option value="4" {{ (old('idcategoria') ?? $pelicula->idcategoria ?? '') == 4 ? 'selected' : '' }}>Terror</option>
                            </select>
                        </div>
                    </div>

                    <!-- Dirección -->
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Dirección</label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" name="direccion"
                                   value="{{ old('direccion') ?? $pelicula->direccion ?? '' }}">
                        </div>
                    </div>

                    <!-- Año -->
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Año</label>
                        <div class="col-sm-10">
                            <input required type="number" class="form-control" name="año"
                                   value="{{ old('año') ?? $pelicula->año ?? '' }}">
                        </div>
                    </div>

                    <!-- Portada -->
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Portada</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="portada" id="portada" accept="image/*" onchange="previsualizar(event)">
                        </div>
                    </div>

                    <!-- Sinopsis -->
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Sinopsis</label>
                        <div class="col-sm-10">
                            <textarea required class="form-control" name="sinopsis" rows="5">{{ old('sinopsis') ?? $pelicula->sinopsis ?? '' }}</textarea>
                        </div>
                    </div>

                    <hr>

                    @auth
                        <button type="submit" class="btn btn-primary">Alta película</button>
                    @endauth
                </form>
            </div>

            <!-- Imagen -->
            <div class="col-12 col-lg-4 text-center mt-4 mt-lg-0">
                <img id="previsualizar" src="{{ asset('img/sinportada.jpg') }}" alt="previsualizar" class="img-fluid rounded border">
            </div>
        </div>
    </div>
</section>
@endsection
