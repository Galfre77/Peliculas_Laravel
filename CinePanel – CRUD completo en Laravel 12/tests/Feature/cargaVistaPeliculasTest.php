<?php

namespace Tests\Feature;

use App\Models\Pelicula;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class cargaVistaPeliculasTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_carga_vista_detalles_pelicula(): void
    {
        $pelicula = Pelicula::factory()->create();

        $response = $this->get("/pelicula/{$pelicula->idpelis}");

        $response->assertStatus(200);
        $response->assertSee('create películas');
        $pelicula->delete(); // Eliminar la película creada para mantener la base de datos limpia

    }
public function test_carga_vista_inicio(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Listado de inicio');

    }

    public function test_carga_vista_peliculas(): void
    {
        $response = $this->get('/peliculas');

        $response->assertStatus(200);
        $response->assertSee('todas las pelis ');

    }
    public function test_carga_vista_peliculas_alta(): void
    {
        $response = $this->get('/pelicula/alta');

        $response->assertStatus(200);
        $response->assertSee('alta la película');

    }
    public function test_carga_vista_pelicula(): void
    {
        $response = $this->get('/pelicula/{idpelis}');

        $response->assertStatus(200);
        $response->assertSee('Listado de películas');

    }
    public function test_carga_vista_pelicula_detalle(): void
    {
        $response = $this->get('/pelicula-mto/{idpelis}');

        $response->assertStatus(200);
        $response->assertSee('mantenimiento de la película');

    }
}
