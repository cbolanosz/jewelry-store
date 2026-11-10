<?php

/* Author: Cristian Bolaños */

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        $subtotal = $this->faker->randomFloat(2, 500, 50000);
        $shippingCost = $subtotal >= 1000 ? 0 : 25;

        return [
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'shipped', 'delivered', 'cancelled']),
            'shipping_address' => $this->faker->streetAddress().', '.$this->faker->city(),
            'subtotal' => $subtotal,
            'shipping_cost' => $shippingCost,
            'total_amount' => round($subtotal + $shippingCost, 2),
            'user_id' => User::factory(),
            'created_at' => $this->faker->dateTimeBetween('-1 year'),
        ];
    }
}
