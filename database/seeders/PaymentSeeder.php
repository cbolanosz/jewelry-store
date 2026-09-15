<?php

/* Author: Diego Mesa */

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        $orders = Order::where('status', '!=', 'pending')->get();

        foreach ($orders as $order) {
            if ($order->getStatus() === 'cancelled') {
                $status = 'refunded';
            } else {
                $status = 'approved';
            }

            Payment::factory()->create([
                'order_id' => $order->getId(),
                'amount' => $order->getTotalAmount(),
                'date' => $order->getDate(),
                'status' => $status,
            ]);
        }
    }
}
