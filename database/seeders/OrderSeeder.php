<?php

/* Author: Cristian Bolaños */

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $clients = User::where('role', 'client')->get();

        foreach ($clients as $client) {
            Order::factory()->count(2)->create([
                'user_id' => $client->getId(),
                'shipping_address' => $client->getAddress(),
            ]);
        }
    }
}
