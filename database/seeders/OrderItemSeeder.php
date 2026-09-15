<?php

/* Author: Diego Mesa */

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();
        $orders = Order::all();

        foreach ($orders as $order) {
            foreach ($products->random(fake()->numberBetween(1, 3)) as $product) {
                $quantity = fake()->numberBetween(1, 2);
                OrderItem::factory()->create([
                    'order_id' => $order->getId(),
                    'product_id' => $product->getId(),
                    'quantity' => $quantity,
                    'unit_price' => $product->getPrice(),
                    'subtotal' => round($product->getPrice() * $quantity, 2),
                ]);
            }

            $order->setSubtotal($order->calculateSubtotal());
            $order->setShippingCost($order->calculateShippingCost());
            $order->setTotalAmount($order->calculateTotal());
            $order->save();
        }
    }
}
