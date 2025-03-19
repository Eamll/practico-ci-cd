<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    public function definition()
    {
        return [
            'nombres' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'telefono' => $this->faker->phoneNumber,
            'direccion' => $this->faker->address,
            'fecha_registro' => $this->faker->date,
            'tipo_documento' => $this->faker->randomElement(['DNI', 'RUC']),
            'numero_documento' => $this->faker->unique()->numberBetween(10000000, 99999999),
        ];
    }
}
