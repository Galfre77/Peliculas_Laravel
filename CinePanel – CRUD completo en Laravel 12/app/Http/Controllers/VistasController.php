<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class VistasController extends Controller
{
    // Carga la vista principal (index)
    public function index()
    {
        return view('index');
    }
    // Carga la vista con todas las películas
    public function consultarPeliculas()
    {
        $datos = request()->all();
        $filtro = $datos['filtro'] ?? null;

        $peliculas = Pelicula::consulta($filtro);
        // dd($peliculas->toArray());

        return view('peliculas')->with(compact('peliculas', 'filtro'));
    }

    // Carga una vista con los detalles de una sola película
    public function consultarPelicula($idpelis)
    {
        $pelicula = Pelicula::where('idpelis', $idpelis)->first();
        // dd($pelicula->toArray());
        return view('pelicula')->with(compact('pelicula'));
    }

    // Carga una vista con el formulario de modificación de película
    public function mtoPelicula($idpelis)
    {
        $pelicula = Pelicula::where('idpelis', $idpelis)->first();
        // dd($pelicula->toArray());
        return view('pelicula-mto')->with(compact('pelicula'));
    }

    // Carga la vista con el formulario para dar de alta una nueva película
    public function altaPelicula()
    {
        $peliculas = Pelicula::all();
        return view('pelicula-alta')->with(compact('peliculas'));
    }

}
?>
