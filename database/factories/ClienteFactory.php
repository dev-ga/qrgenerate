<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_rs' => $this->faker->nombre_rs,
            'cedula_rif' => $this->faker->cedula_rif,
            'direccion' => $this->faker->direccion,
            'email' => $this->faker->unique()->safeEmail,
            'telefono1' => $this->faker->telefono1,
            'estatus' => $this->faker->estatus
        ];
    }
}
