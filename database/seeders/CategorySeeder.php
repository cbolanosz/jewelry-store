<?php

/* Author: Pablo José Benítez Trujillo */

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::factory()->create([
            'name' => 'Watches',
            'description' => 'Luxury watches from Rolex, Audemars Piguet, Richard Mille and other iconic brands.',
        ]);

        Category::factory()->create([
            'name' => 'Rings',
            'description' => 'Rings made of gold, platinum and diamonds.',
        ]);

        Category::factory()->create([
            'name' => 'Necklaces',
            'description' => 'Necklaces and pendants made of gold and precious stones.',
        ]);

        Category::factory()->create([
            'name' => 'Bracelets',
            'description' => 'Bracelets made of gold, silver and diamonds.',
        ]);

        Category::factory()->create([
            'name' => 'Earrings',
            'description' => 'Earrings made of gold, pearls and precious stones.',
        ]);
    }
}
