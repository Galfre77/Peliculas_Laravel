<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\peliculaController;
use App\Http\Controllers\VistasController;
use App\Http\Controllers\AutenticacionSessionController;
use App\Models\Usuario;
use Illuminate\Support\Facades\Route;

// Ruta  que llama a los metodos del controlador VistasController
Route::get('/',                            [VistasController::class, 'index'])->name('inicio');
Route::get('/peliculas',                   [VistasController::class, 'consultarPeliculas'])->name('vista.peliculas');
Route::get('/pelicula/alta',               [VistasController::class, 'altaPelicula'])->name('alta.pelicula')->middleware('auth');
Route::get('/pelicula/{idpelis}',          [VistasController::class, 'consultarPelicula'])->name('vista.pelicula');
Route::get('/pelicula-mto/{idpelis}',      [VistasController::class, 'mtoPelicula'])->name('mto.pelicula')->middleware('auth');

// Rutas que llaman a los metodos del controlador AutenticacionSessionController
Route::get('/login',         [AutenticacionSessionController::class, 'login'])->name('login');
Route::post('/login',        [AutenticacionSessionController::class, 'validar'])->name('validar');
Route::get('/logout',        [AutenticacionSessionController::class, 'logout'])->name('logout');

// Ruta que llama a los metodos del controlador peliculaController
Route::post('pelicula/alta',             [peliculaController::class, 'altaPelicula'])->name('pelicula.alta');
Route::put('pelicula-mto/{pelicula}',    [peliculaController::class, 'mtoPelicula'])->name('pelicula.mto');
Route::delete('pelicula-mto/{idepelis}', [peliculaController::class, 'bajaPelicula'])->name('pelicula.baja');

// Ruta que llama a los metodos del controlador UserController
Route::get('/usuario',                       [UserController::class, 'usuario'])->name('usuario');
Route::post('/usuario',                      [UserController::class, 'guardarUsuario'])->name('guardar.usuario');


