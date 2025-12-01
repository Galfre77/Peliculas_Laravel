<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelicula extends Model
{
    use HasFactory;
    protected $table      = 'peliculas';
    protected $primaryKey = 'idpelis';
    public    $timestamps = false;

    protected $fillable = [
        'titulo',
        'direccion',
        'año',
        'sinopsis',
        'portada',
        'idcategoria',
    ];

    public static function consulta($filtro)
    {

        return Pelicula::where('titulo', 'like', "%$filtro%")->orderBy('titulo')->get();

    }

    public static function alta(array $datos)
    {

        return self::create($datos);
    }
}
