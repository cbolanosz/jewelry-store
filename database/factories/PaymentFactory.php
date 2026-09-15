<?php

/* Author: Diego Mesa */

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PaymentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'amount' => fake()->randomFloat(2, 500, 50000),
            'method' => fake()->randomElement(['credit_card', 'debit_card', 'bank_transfer']),
            'date' => fake()->dateTimeBetween('-1 year')->format('Y-m-d'),
            'status' => 'approved',
            'transaction_code' => 'TX-'.strtoupper(Str::random(12)),
            'order_id' => Order::factory(),
        ];
    }
}
