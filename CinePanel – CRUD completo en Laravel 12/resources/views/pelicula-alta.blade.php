@extends('layout')
@section('contenido')

    <section id='contenido'>
        <div class='row animated fadeIn slow'>
            <div class='column col-8'>
                <div class='page-header'>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
                <form action="{{ route('pelicula.alta') }}" method='post' enctype="multipart/form-data" >
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Título</label>
                        <div class="col-sm-10">
                        <input required type="text" class="form-control" name="titulo" value = "{{  old('titulo') ?? $pelicula->titulo ?? null  }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Categoría</label>
                        <div class="col-sm-10">
                            <select required class="form-control" name="idcategoria">
                                <optioin value="">Seleccione una categoría</option>
                                <option value="1" {{ (old('idcategoria') ?? $pelicula->idcategoria ?? null) == 1 ? 'selected' : '' }}>Acción</option>
                                <option value="2" {{ (old('idcategoria') ?? $pelicula->idcategoria ?? null) == 2 ? 'selected' : '' }}>Comedia</option>
                                <option value="3" {{ (old('idcategoria') ?? $pelicula->idcategoria ?? null) == 3 ? 'selected' : '' }}>Drama</option>
                                <option value="4" {{ (old('idcategoria') ?? $pelicula->idcategoria ?? null) == 4 ? 'selected' : '' }}>Terror</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Dirección</label>
                        <div class="col-sm-10">
                        <input required type="text" class="form-control" name="direccion" value = "{{ old('direccion') ?? $pelicula->direccion ?? null }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Año</label>
                        <div class="col-sm-10">
                        <input required type="number" class="form-control" name="año" value = "{{ old('año') ?? $pelicula->año ?? null }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Portada</label>
                        <div class="col-sm-10">
                        <input type="file" class="form-control" name="portada" id='portada'  accept='image/*' onchange="previsualizar(event)">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Sinopsis</label>
                        <div class="col-sm-10">
                        <textarea required class="form-control" name="sinopsis" rows="5" >{{ old('sinopsis') ?? $pelicula->sinopsis ?? null }}</textarea>
                        </div>
                    </div>
                    <hr>
                    @auth
                        <button type="submit" class="btn btn-primary">Alta película</button>
                    @endauth
                </form>
            </div>
            <div class='column col-4'>
                <img id=previsualizar src='{{asset("img/sinportada.jpg")}}' alt="previsualizar" id='previsualizar'>
            </div>
        </div>
    </section>

@endsection
