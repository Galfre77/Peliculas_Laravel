<?php

namespace App\Http\Controllers;
use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\VarDumper\VarDumper;

class peliculaController extends Controller
{

    public function autentificar()
    {
        $this->middleware('auth',['except'=>['consultarPeliculas','consultarPelicula']]);
    }
    // metodo de alta de pelicula
    public function altaPelicula(Request $request)
    {
        $formDatos = $request->all();
        $imagenPortada = $request->file('portada');




        // Reglas de validación
        $reglas = [
            "titulo" => "required|min:3|max:60|unique:peliculas,titulo",
            "direccion" => "required|max:200",
            "año" => "required|integer|min:1900|max:2024",
            "sinopsis" => "required|max:250",
            "portada" => "image|max:400|mimes:jpg,png,gif,jpeg",
            "idcategoria" => "exists:categorias,idcategoria",
        ];

        // Mensajes personalizados
        $mensajes = [
            "titulo.required" => "El título es obligatorio",
            "titulo.min" => "El título debe tener al menos 3 caracteres",
            "titulo.max" => "El título no puede tener más de 60 caracteres",
            "titulo.unique" => "El título ya existe",
            "direccion.required" => "El director es obligatorio",
            "direccion.max" => "El director no puede tener más de 200 caracteres",
            "año.required" => "El año es obligatorio",
            "año.integer" => "El año debe ser un número entero",
            "año.min" => "El año debe ser al menos 1900",
            "año.max" => "El año no puede ser mayor que 2024",
            "sinopsis.required" => "La sinopsis es obligatoria",
            "sinopsis.max" => "La sinopsis no puede tener más de 250 caracteres",
        ];

        $validate = validator($formDatos, $reglas, $mensajes);

        if ($validate->fails()) {
            return redirect()->route("pelicula.alta")->withErrors($validate)->withInput();
        }

        // Procesar portada
        if ($imagenPortada) {
            $formDatos['portada'] = $imagenPortada->getClientOriginalName();
            Storage::putFileAs('public/img', $imagenPortada, $formDatos['portada']);
        } else {
            $formDatos['portada'] = "sinportada.jpg";
        }

        // Alta de la película
        Pelicula::alta($formDatos);

        $aviso = "Pelicula dada de alta correctamente";
        return redirect()->route("pelicula.alta")->with("success", $aviso);

    }

        //funcion para modificar una pelicula, utilisando route model binding
    public function mtoPelicula(Pelicula $pelicula, Request $request)
    {
        $imagenPortada = $request->file('portada');
        $formDatos = $request->all();
        $reglas = [
            "titulo"   =>"required|min:3|max:60|unique:peliculas,titulo,{$pelicula->idpelis},idpelis",
            "direccion"=>"required|max:200",
            "año"      =>"required|integer|min:1900|max:2024",
            "sinopsis" =>"required|max:250",
            "portada"  =>"image|max:400|mimes:jpg,png,gif,jpeg",
        ];

        $request->validate($reglas);
        if ($imagenPortada ){
            $formDatos['portada'] = $imagenPortada->getClientOriginalName();
            //mover la imagen a la carpeta public/img
            Storage::putFileAs( $imagenPortada, $formDatos['portada']);
        }
        // modificar la pelicula en la base de datos
        $pelicula->update($formDatos);
        $aviso = "Pelicula modificada correctamente";
        return redirect()->route("pelicula.mto", [$pelicula->idpelis])->with("success", "aviso" );
    }
    function bajaPelicula($idpelis){
        // busca la pelicula a eliminar
        $borrar = Pelicula::find($idpelis);
        $borrar->delete();
        if ($borrar){
            // eliminar la imagen de la carpeta public/img si no es la imagen por defecto
            if ($borrar->portada != "sinportada.jpg"){
                Storage::delete($borrar->portada);
            }
        }
        $imagenPortada = $borrar->portada;
        $aviso = "Pelicula eliminada correctamente, $borrar->titulo";
        return redirect()->route("vista.peliculas")->with("success",  $aviso);
    }
    public function buscarPeliculas(Request $request)
    {
        $query  = Pelicula::query();
        $filtro = $request->input('filtro');   // valor del filtro (puede ser null)

        if ($request->filled('filtro')) {
            $query->where('titulo', 'like', '%' . $filtro . '%');
        }
        $peliculas = $query->orderBy('titulo')->get();

        return view('peliculas', compact('peliculas', 'filtro'));
    }

}

