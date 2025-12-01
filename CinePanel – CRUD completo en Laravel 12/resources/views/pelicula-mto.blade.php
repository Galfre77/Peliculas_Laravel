@extends('layout')


@section('contenido')
<section id='contenido'>
    <div class='row animated fadeIn slow'>
        <div class='column col-8'>
            <div class="card m-auto">
                <form id='formulario' action="{{ route('pelicula.mto', $pelicula) }}" method="post" enctype="multipart/form-data" novalidate='true'>
                    @if (session('success')&& is_array(session('success'))&& isset(session('success')['aviso']))
                    <div class="alert alert-success">
                        {{ session('success')['aviso'] }}
                    </div>
                    @endif
                    @csrf
                    @method('PUT')
                    @if ($pelicula)
                    <div class="card-body">

                        <h2 class="card-title">
                            <input name='titulo' type='text' value="{{ $pelicula->titulo ?? null }}">
                            @error('titulo')
                            <div class='class="alert alert-danger'> {{ $message }}</div>
                            @enderror
                        </h2>
                        <hr>
                        <h5 class="card-subtitle mb-2 text-muted">Dirección:
                            <input name='direccion' value="{{ $pelicula->direccion ?? null }}">
                            @error('direccion')
                            <div class='class="alert alert-danger'> {{ $message }}</div>
                            @enderror
                        </h5>
                        <h5 class="card-subtitle mb-2 text-muted">Año:
                            <input name='año' type='number' min='2000' max='2025' value="{{ $pelicula->año ?? null }}">
                            @error('año')
                            <div class='class="alert alert-danger'> {{ $message }}</div>
                            @enderror
                        </h5>
                        <hr>
                        <textarea rows='8' cols='90' name='sinopsis'>{{ $pelicula->sinopsis ?? null }}</textarea>
                        @error('sinopsis')
                        <div class='class="alert alert-danger'> {{ $message }}</div>
                        @enderror
                        <hr>
                        <input type="file" class="form-control" name="portada" id='portada' accept='image/*'>
                        @error('portada')
                        <div class='class="alert alert-danger'> {{ $message }}</div>
                        @enderror
                        <hr>
                        @auth
                            <button type="submit" class="btn btn-warning" value="modificar" onclick="enviarForm('PUT')">Modificar película</button>
                            <button type="button" class="btn btn-danger"  value="baja"      onclick="enviarForm('DELETE')">Baja película</button>
                        @endauth
                        <a href="{{ route('vista.peliculas') }}" class="btn btn-outline-primary btn-block" style='float:right'>Volver a listado</a>
                    </div>
                    @else
                    <h4>No existe la película</h4>
                    @endif
                </form>
                <br>
            </div>
        </div>

        <div class='column col-4'>
            <img src='{{ asset("img/$pelicula->portada") }}' alt="previsualizar" id='previsualizar'>
        </div>
    </div>
</section>
<script src="{{ asset('/js/enviar.js') }}" ></script>

@endsection

