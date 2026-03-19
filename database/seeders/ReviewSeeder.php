<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
       
        $products = Product::all();

        // 2. Find the first user, or create one if the table is empty
        $user = User::first() ?? User::factory()->create();

        
        $placeholders = [
            'Exceptional quality, exactly what I was looking for!',
            'Decent product for the price. Would buy again.',
            'Arrived on time and works perfectly.',
            'The material feels premium and durable.',
            'A bit smaller than I expected, but still great quality.',
            'Perfect gift for my friend, they loved it!',
            'Roots never disappoints with their collection.',
            'Highly recommend this to anyone starting out.',
            'Great value for money and fast shipping.',
            'Absolutely love the design of this item.'
        ];

       
        foreach ($products as $product) {
            
            // 5. Create exactly 3 reviews for each product
            for ($i = 0; $i < 3; $i++) {
                Review::create([
                    'product_id' => $product->id,
                    'user_id'    => $user->id,
                    'rating'     => rand(3, 5), 
                    'comment'    => $placeholders[array_rand($placeholders)], // Pick random text
                ]);
            }
        }
    }
}