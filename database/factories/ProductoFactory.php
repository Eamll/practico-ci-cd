<?php

namespace Database\Factories;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->sentence,
            'descripcion' => $this->faker->paragraph,
            'precio' => $this->faker->randomFloat(2, 10, 1000),
            'categoria' => implode(' ', $this->faker->words(3)),
            'stock' => $this->faker->numberBetween(0, 100),
            'estado' => $this->faker->boolean,
        ];
    }
}
