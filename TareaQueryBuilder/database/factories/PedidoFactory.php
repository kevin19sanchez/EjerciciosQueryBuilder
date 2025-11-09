<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'producto' => $this->faker->word(),
            'cantidad' => $this->faker->numberBetween(1, 10),
            'total' => $this->faker->randomFloat(2, 10, 1000),
            'id_usuario' => Usuario::factory(),
        ];
    }
}
