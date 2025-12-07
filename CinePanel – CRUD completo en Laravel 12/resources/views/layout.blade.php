<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Películas</title>

    <!-- Vista adaptable para móviles -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
          crossorigin="anonymous">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <!-- Script local -->
    <script src="{{ asset('js/previsualizar.js') }}"></script>
</head>
<body>
    <main class='animated fadeIn slow'>
        <h1 class="text-center">Películas 🎥</h1>

        <!-- Navbar Bootstrap -->
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark mb-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Inicio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" aria-current="page" href="{{ route('vista.peliculas') }}">Lista de películas</a>
                        @auth
                            <a class="nav-link" href="{{ route('alta.pelicula') }}">Alta película</a>
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        @endauth
                        @guest
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                            <a class="nav-link" href="{{ route('usuario') }}">Register</a>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <hr>

        <section id='contenido'>
            @yield('contenido')
        </section>

        <hr>

        <footer>
            <p>&copy; 2025</p>
        </footer>
    </main>

    <!-- Bootstrap JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous">
    </script>
</body>
</html>
