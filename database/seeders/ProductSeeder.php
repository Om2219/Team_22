<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $toy = Category::where('name', 'Toys')->first();

        $stat = Category::where('name', 'Stationary')->first();

        $book = Category::where('name', 'Books')->first();

        $office = Category::where('name', 'Office')->first();

        $art = Category::where('name', 'ArtCraft')->first();

      
        Product::create ([
  
            'name' => 'Suja the Goat',
            'product_description' => 'PIPE DOWN PRINCESS',
            'price' => 67.69,
            'category_id' => $art->id
        ]);

        Product::create ([
  
            'name' => 'Yoyo',
            'product_description' => 'It goes up and it goes down',
            'price' => 6.70,
            'category_id' => $toy->id
        ]);

    }
}
