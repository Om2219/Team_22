<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
{
    $products = \App\Models\Product::all();
    // Get an existing user or create a test one
    $user = \App\Models\User::first() ?? \App\Models\User::factory()->create();

    foreach ($products as $product) {
        // Create 3 random reviews for each product to test the filter
        for ($i = 0; $i < 3; $i++) {
            \App\Models\Review::create([
                'product_id' => $product->id,
                'user_id' => $user->id,
                'rating' => rand(1, 5), // Uses your confirmed 'rating' column
                'comment' => 'Professional quality from Roots.',
            ]);
        }
    }
}
    
}
