<?php

namespace Database\Seeders;

use App\Models\Pelicula;
use Database\Factories\pelisFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class plaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

         // Insert default categories
        DB::table('categorias')->insert([
            ['idcategoria' => 1, 'nombre' => 'Acción'],
            ['idcategoria' => 2, 'nombre' => 'Comedia'],
            ['idcategoria' => 3, 'nombre' => 'Terror'],
            ['idcategoria' => 4, 'nombre' => 'Aventura']
        ]);

        DB::table('users')->insert([
            'nombre'    => 'admin',
            'email'     => 'admin@admin.com',
            'password'  => bcrypt('123456789'),
        ]);

        // Insertar default peliculas
        DB::table('peliculas')->insert([
        // Acción (idcategoria = 1)
        [
            'titulo'    => 'Misión Explosiva',
            'direccion' => 'John Matrix',
            'año'       => 2021,
            'sinopsis'  => 'Un agente especial debe desactivar una amenaza global.',
            'portada'   => 'mision.jpg',
            'idcategoria' => 1,
        ],
        [
            'titulo'    => 'Rescate Extremo',
            'direccion' => 'Jane Carter',
            'año'       => 2022,
            'sinopsis'  => 'Un comando élite en una operación suicida.',
            'portada'   => 'rescate.jpg',
            'idcategoria' => 1,
        ],
        // Comedia (idcategoria = 2)
        [
            'titulo'    => 'Risas de Oficina',
            'direccion' => 'Tom Humor',
            'año'       => 2020,
            'sinopsis'  => 'Una serie de enredos en una empresa disfuncional.',
            'portada'   => 'risas.jpg',
            'idcategoria' => 2,
        ],
        [
            'titulo'    => 'Vacaciones Locas',
            'direccion' => 'Lola Funny',
            'año'       => 2023,
            'sinopsis'  => 'Unas vacaciones que se salen completamente de control.',
            'portada'   => 'vacaciones.jpg',
            'idcategoria' => 2,
        ],
        // Drama (idcategoria = 3)
        [
            'titulo'    => 'El Último Invierno',
            'direccion' => 'Carlos Nieve',
            'año'       => 2021,
            'sinopsis'  => 'Una historia sobre amor y pérdida en tiempos difíciles.',
            'portada'   => 'ultimo.jpg',
            'idcategoria' => 3,
        ],
        [
            'titulo'    => 'Caminos Cruzados',
            'direccion' => 'Ana Trama',
            'año'       => 2019,
            'sinopsis'  => 'Dos vidas unidas por el destino.',
            'portada'   => 'camino-cruzado.jpg',
            'idcategoria' => 3,
        ],
        // Ciencia ficción (idcategoria = 4)
        [
            'titulo'    => 'Neón Galáctico',
            'direccion' => 'Zoe Future',
            'año'       => 2025,
            'sinopsis'  => 'Una batalla interestelar por la supervivencia.',
            'portada'   => 'neo.jpg',
            'idcategoria' => 4,
        ],
        [
            'titulo'    => 'Código Cuántico',
            'direccion' => 'Max Quantum',
            'año'       => 2024,
            'sinopsis'  => 'Un hacker viaja entre dimensiones.',
            'portada'   => 'codigo.jpg',
            'idcategoria' => 4,
        ],
    ]);

        Pelicula::factory()->count(0)->create();
    }
}
