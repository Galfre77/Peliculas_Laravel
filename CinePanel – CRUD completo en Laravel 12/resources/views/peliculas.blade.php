@extends('layout')


@section('contenido')

    <section id='contenido'>
        <div class='row animated fadeIn slow'>
            <form action="{{ route('vista.peliculas') }}" method="GET" class="d-flex justify-content-center">
                <div class="m-3">
                    <label class="form-label">Buscar por título:</label>
                    <input autofocus type="search" class="form-control" id="filtro"  name="filtro" value="{{ $filtro ?? '' }}" oninput="this.form.submit()">
                </div>
            </form>
            @if (session('success')&& is_array(session('success'))&& isset(session('success')['aviso']))
                <div class="alert alert-success">
                    {{ session('success')['aviso'] }}
                </div>
            @endif
        </div>
        <hr>
        <div class="row row-cols-4 d-flex justify-content-evenly">
            @forelse ($peliculas as $pelicula)

                <div class="card m-2 mb-5">
                    <div class='column col-4'>
                    <img src='{{asset("img/$pelicula->portada")}}'>
                    </div>

                    <div class="card-body">
                        <h4 class="card-title">{{$pelicula->titulo ?? null}}</h4>
                        <p class="card-text"></p>
                        <p class="card-text">Dirección: {{$pelicula->direccion ?? null}}</p>
                        <p class="card-text">
                            <small class="text-muted">Año: {{$pelicula->año ?? null}} </small>
                        </p>
                        <a href="{{route('vista.pelicula', $pelicula->idpelis)}}" class="btn btn-outline-primary btn-block">Ver más...</a>
                        @auth
                        @endauth
                    </div>
                </div>
            @empty
            <tr>
                <td colspan="4">No hay películas 🎬</td>
            </tr>
            @endforelse

        </div>
    </section>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('filtro');

        if (input && input.value) {
            input.focus(); // Enfoca el campo
            // Mueve el cursor al final del texto
            const length = input.value.length;
            input.setSelectionRange(length, length);
        }
    });
    </script>



@endsection
