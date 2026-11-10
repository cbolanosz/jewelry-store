<?php

/* Author: Pablo José Benítez Trujillo */

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $name = ucwords($this->faker->unique()->words(3, true));

        return [
            'name' => $name,
            'description' => $this->faker->sentence(15),
            'material' => $this->faker->randomElement(['18k yellow gold', '18k white gold', '18k rose gold', 'Platinum', 'Stainless steel', 'Titanium']),
            'price' => $this->faker->randomFloat(2, 500, 100000),
            'stock' => $this->faker->numberBetween(0, 20),
            'weight' => $this->faker->randomFloat(2, 2, 250),
            'image_url' => 'https://placehold.co/600x600/0f0f0f/c9a227?text='.urlencode($name),
            'active' => true,
            'category_id' => Category::factory(),
        ];
    }
}
