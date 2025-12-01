<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PeliculaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo'     => fake()->unique()->text(20),
            'direccion'  => fake()->text(200),
            'año'        => fake()->year(),
            'sinopsis'   => fake()->text(300),
            'portada'    => 'sinportada.jpg',
            'idcategoria'=> fake()->numberBetween(1, 4),
        ];
    }
}
