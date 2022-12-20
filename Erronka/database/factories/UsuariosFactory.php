<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuarios;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuarios>
 */
class UsuariosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->firstName(),
            'apellido'=>$this->faker->lastName(),
            'usuario'=>$this->faker->name(),
            'pass'=>'Inf041',
            'foto'=>'default.png',
            'type'=>'png',
            'rol'=>1,
        ];
    }
}
