<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pizza>
 */
class PizzaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => fake()->randomElement(["Neapolitan Pizza", "Sicilian Pizza", "Pizza Margherita"]),
            'description' => fake()->sentence(),
            'price' => fake()->randomFloat(2, 5, 20),
            'image' => fake()->imageUrl(200, 200, 'food'),
        ];
    }
}
