<?php

/* Author: Cristian Bolaños */

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        $subtotal = fake()->randomFloat(2, 500, 50000);
        $shippingCost = $subtotal >= 1000 ? 0 : 25;

        return [
            'date' => fake()->dateTimeBetween('-1 year')->format('Y-m-d'),
            'status' => fake()->randomElement(['pending', 'confirmed', 'shipped', 'delivered', 'cancelled']),
            'shipping_address' => fake()->streetAddress().', '.fake()->city(),
            'subtotal' => $subtotal,
            'shipping_cost' => $shippingCost,
            'total_amount' => round($subtotal + $shippingCost, 2),
            'user_id' => User::factory(),
        ];
    }
}
