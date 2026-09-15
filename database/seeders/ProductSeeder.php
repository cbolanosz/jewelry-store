<?php

/* Author: Pablo José Benítez Trujillo */

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['Watches', 'Rolex Submariner Date', 'Iconic diving watch with a unidirectional rotatable bezel and a 41 mm case.', 'Oystersteel and 18k yellow gold', 16500, 8, 155],
            ['Watches', 'Rolex Cosmograph Daytona', 'Legendary chronograph designed for racing drivers, with a tachymetric bezel.', '18k white gold', 45000, 3, 180],
            ['Watches', 'Audemars Piguet Royal Oak', 'Luxury sports watch with an octagonal bezel and the famous Grande Tapisserie dial.', 'Stainless steel', 38000, 4, 140],
            ['Watches', 'Richard Mille RM 11-03', 'Automatic flyback chronograph with a skeletonized movement and a tonneau case.', 'Titanium', 210000, 1, 70],
            ['Watches', 'Patek Philippe Nautilus', 'Elegant sports watch with a porthole-shaped case and a horizontally embossed dial.', 'Stainless steel', 95000, 2, 125],
            ['Rings', 'Solitaire Diamond Ring', 'Classic engagement ring with a 1.5 carat round brilliant diamond.', 'Platinum', 12500, 6, 4.5],
            ['Rings', 'Diamond Eternity Band', 'Band set with a continuous line of brilliant diamonds.', '18k white gold', 6800, 10, 3.8],
            ['Rings', 'Emerald Cocktail Ring', 'Statement ring with an emerald cut emerald surrounded by diamonds.', '18k yellow gold', 9200, 0, 6.2],
            ['Necklaces', 'Cuban Link Chain', 'Heavy Cuban link chain with a secure box clasp.', '18k yellow gold', 14500, 5, 95],
            ['Necklaces', 'Diamond Tennis Necklace', 'Necklace with a single row of perfectly matched diamonds.', '18k white gold', 28000, 2, 32],
            ['Necklaces', 'Sapphire Pendant', 'Oval blue sapphire pendant with a diamond halo.', 'Platinum', 7400, 7, 8.5],
            ['Bracelets', 'Diamond Tennis Bracelet', 'Flexible bracelet with a line of brilliant cut diamonds.', '18k white gold', 11000, 4, 15],
            ['Bracelets', 'Gold Cuban Bracelet', 'Solid Cuban link bracelet with a polished finish.', '18k yellow gold', 8900, 9, 60],
            ['Earrings', 'Diamond Stud Earrings', 'Timeless stud earrings with round brilliant diamonds.', '18k white gold', 5400, 12, 2.4],
            ['Earrings', 'Pearl Drop Earrings', 'Elegant drop earrings with South Sea pearls.', '18k yellow gold', 2600, 15, 6],
            ['Earrings', 'Ruby Hoop Earrings', 'Hoop earrings set with vivid red rubies.', '18k rose gold', 4300, 3, 7.5],
        ];

        foreach ($products as $product) {
            Product::factory()->create([
                'category_id' => Category::where('name', $product[0])->firstOrFail()->getId(),
                'name' => $product[1],
                'description' => $product[2],
                'material' => $product[3],
                'price' => $product[4],
                'stock' => $product[5],
                'weight' => $product[6],
                'image_url' => 'https://placehold.co/600x600/0f0f0f/c9a227?text='.urlencode($product[1]),
            ]);
        }
    }
}
