<?php

/* Author: Pablo José Benítez Trujillo */

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucfirst(fake()->unique()->word()),
            'description' => fake()->sentence(12),
            'active' => true,
        ];
    }
}
