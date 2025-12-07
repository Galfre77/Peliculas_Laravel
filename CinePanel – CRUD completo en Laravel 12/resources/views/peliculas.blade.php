@extends('layout')

@section('contenido')
<section id='contenido'>
    <div class='row animated fadeIn slow'>
        <!-- Formulario de búsqueda centrado -->
        <form action="{{ route('vista.peliculas') }}" method="GET" class="d-flex justify-content-center flex-wrap">
            <div class="m-3 w-100 w-md-auto">
                <label class="form-label">Buscar por título:</label>
                <input autofocus type="search" class="form-control" id="filtro" name="filtro"
                    value="{{ $filtro ?? '' }}" oninput="this.form.submit()">
            </div>
        </form>

        <!-- Mensaje de éxito -->
        @if (session('success') && is_array(session('success')) && isset(session('success')['aviso']))
            <div class="alert alert-success">
                {{ session('success')['aviso'] }}
            </div>
        @endif
    </div>

    <hr>

    <!-- Grid responsive de películas -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        @forelse ($peliculas as $pelicula)
            <div class="col">
                <div class="card h-100">
                    <img src='{{ asset("img/$pelicula->portada") }}' class="card-img-top img-fluid" alt="Portada">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title">{{ $pelicula->titulo ?? 'Sin título' }}</h4>
                        <p class="card-text">Dirección: {{ $pelicula->direccion ?? 'Desconocida' }}</p>
                        <p class="card-text">
                            <small class="text-muted">Año: {{ $pelicula->año ?? 'N/A' }}</small>
                        </p>
                        <a href="{{ route('vista.pelicula', $pelicula->idpelis) }}" class="btn btn-outline-primary mt-auto">Ver más...</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col">
                <div class="alert alert-warning text-center">No hay películas 🎬</div>
            </div>
        @endforelse
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('filtro');
        if (input && input.value) {
            input.focus();
            const length = input.value.length;
            input.setSelectionRange(length, length);
        }
    });
</script>
@endsection
