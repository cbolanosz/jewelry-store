<?php

/* Author: Diego Mesa */

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    public function definition(): array
    {
        $quantity = fake()->numberBetween(1, 3);
        $unitPrice = fake()->randomFloat(2, 500, 50000);

        return [
            'quantity' => $quantity,
            'unit_price' => $unitPrice,
            'subtotal' => round($unitPrice * $quantity, 2),
            'order_id' => Order::factory(),
            'product_id' => Product::factory(),
        ];
    }
}
