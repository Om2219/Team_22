<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

      
        Product::create ([
  
            'name' => 'Suja',
            'product_description' => 'PIPE DOWN PRINCESS',
            'price' => 67.69,
            'category_id' => 1
        ]);

    }
}
