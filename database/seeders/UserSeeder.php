<?php

/* Author: Cristian Bolaños */

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->admin()->create([
            'first_name' => 'Admin',
            'last_name' => 'Jewelry',
            'email' => 'admin@jewelrymen.com',
            'password' => 'admin1234',
        ]);

        User::factory()->create([
            'first_name' => 'Client',
            'last_name' => 'Jewelry',
            'email' => 'client@jewelrymen.com',
            'password' => 'client1234',
        ]);

        User::factory()->count(8)->create();
    }
}
