<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stock;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Stock::create([
            'product_id' => 1,
            'stock' => 67,
            'low_stock'=>10
        ]);

        Stock::create([
            'product_id' => 2,
            'stock' => 100,
            'low_stock'=>15
        ]);

        Stock::create([
            'product_id' => 3,
            'stock' => 75,
            'low_stock'=>10
        ]);

        Stock::create([
            'product_id' => 4,
            'stock' => 75,
            'low_stock'=>10
        ]);

        Stock::create([
            'product_id' => 5,
            'stock' => 75,
            'low_stock'=>10
        ]);

        Stock::create([
            'product_id' => 6,
            'stock' => 75,
            'low_stock'=>10
        ]);

        Stock::create([
            'product_id' => 7,
            'stock' => 75,
            'low_stock'=>10
        ]);

        Stock::create([
            'product_id' => 8,
            'stock' => 100,
            'low_stock'=>15
        ]);

        Stock::create([
            'product_id' => 9,
            'stock' => 150,
            'low_stock'=>15
        ]);

        Stock::create([
            'product_id' => 10,
            'stock' => 50,
            'low_stock'=>10
        ]);

        Stock::create([
            'product_id' => 11,
            'stock' => 150,
            'low_stock'=>15
        ]);

        Stock::create([
            'product_id' => 12,
            'stock' => 67,
            'low_stock'=>10
        ]);

        Stock::create([
            'product_id' => 13,
            'stock' => 100,
            'low_stock'=>15
        ]);

        Stock::create([
            'product_id' => 14,
            'stock' => 75,
            'low_stock'=>10
        ]);

        Stock::create([
            'product_id' => 15,
            'stock' => 100,
            'low_stock'=>15
        ]);

        Stock::create([
            'product_id' => 16,
            'stock' => 200,
            'low_stock'=>20
        ]);

         Stock::create([
            'product_id' => 17,
            'stock' => 100,
            'low_stock'=>15
        ]);

        Stock::create([
            'product_id' => 18,
            'stock' => 150,
            'low_stock'=>15
        ]);

        Stock::create([
            'product_id' => 19,
            'stock' => 500,
            'low_stock'=>30
        ]);

        Stock::create([
            'product_id' => 20,
            'stock' => 200,
            'low_stock'=>20
        ]);

        Stock::create([
            'product_id' => 21,
            'stock' => 100,
            'low_stock'=>15
        ]);

        Stock::create([
            'product_id' => 22,
            'stock' => 75,
            'low_stock'=>10
        ]);

        Stock::create([
            'product_id' => 23,
            'stock' => 150,
            'low_stock'=>15
        ]);

        Stock::create([
            'product_id' => 24,
            'stock' => 67,
            'low_stock'=>10
        ]);

        Stock::create([
            'product_id' => 25,
            'stock' => 150,
            'low_stock'=>15
        ]);

        Stock::create([
            'product_id' => 26,
            'stock' => 80,
            'low_stock'=>15
        ]);

        Stock::create([
            'product_id' => 27,    //limited edition type shi
            'stock' => 10,
            'low_stock'=>2
        ]);
        Stock::create([
            'product_id' => 28, 
            'stock' => 10,
            'low_stock'=>2
        ]); 
            
        Stock::create([
            'product_id' => 29,
            'stock' => 500,
            'low_stock'=>20
        ]);

        Stock::create([
            'product_id' => 30,
            'stock' => 500,
            'low_stock'=>20
        ]);
        Stock::create([
                'product_id' => 31,
                'stock' => 100,
                'low_stock'=>15
        ]);
    
                

    }
}
