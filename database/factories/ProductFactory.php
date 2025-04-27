<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word, // Genera una palabra aleatoria como nombre
            'quantity' => $this->faker->randomFloat(0, 1, 100), // Genera un precio aleatorio entre 1 y 100 con 2 decimales
            'description' => $this->faker->sentence, // Genera una frase aleatoria como descripción
        ];
    }
}
