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

        $stat = Category::where('name', 'Stationery')->first();

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
        
        Product::create ([
  
            'name' => 'The Whispering Woods',
            'product_description' => 'A copy of "The Whispering Woods"',
            'price' => 6.70,
            'category_id' => $book->id
        ]);

        Product::create ([
  
            'name' => 'Echoes of the Starlit Se Sea',
            'product_description' => 'A copy of "Echoes of the Starlit Se Sea"',
            'price' => 6.70,
            'category_id' => $book->id
        ]);

        Product::create ([
  
            'name' => 'Clockwork Sparrows Secret',
            'product_description' => 'A copy of "Clockwork Sparrows Secret"',
            'price' => 6.70,
            'category_id' => $book->id
        ]);

        Product::create ([
  
            'name' => 'Whispers of the Ancient Stones',
            'product_description' => 'A copy of "Whispers of the Ancient Stones"',
            'price' => 6.70,
            'category_id' => $book->id
        ]);

        Product::create ([
  
            'name' => 'the Forgotten City of Aethelgard',
            'product_description' => 'A copy of "the Forgotten City of Aethelgard"',
            'price' => 6.70,
            'category_id' => $book->id
        ]);

        Product::create ([
  
            'name' => 'Caculator',
            'product_description' => 'Swiftly overcome any mathematical hurdle with the press of a button',
            'price' => 6.70,
            'category_id' => $office->id
        ]);

        Product::create ([
  
            'name' => 'Canvas',
            'product_description' => 'A small frame for you to express your creativity',
            'price' => 6.70,
            'category_id' => $art->id
        ]);

        Product::create ([
  
            'name' => 'Clay',
            'product_description' => 'Mould endless creations with a variety of different colours',
            'price' => 6.70,
            'category_id' => $art->id
        ]);

        Product::create ([
  
            'name' => 'Elastic Bands',
            'product_description' => 'Jar of assorted elastic bands in a variety of different colours',
            'price' => 6.70,
            'category_id' => $stat->id
        ]);

        Product::create ([
  
            'name' => 'Fidget Spinner',
            'product_description' => 'A fidget toy that provides endless engagement',
            'price' => 6.70,
            'category_id' => $toy->id
        ]);

        Product::create ([
  
            'name' => 'Highlighters',
            'product_description' => 'perfect for extracting and illuminating any word/sentence',
            'price' => 6.70,
            'category_id' => $stat->id
        ]);

        Product::create ([
  
            'name' => 'Hole Puncher',
            'product_description' => 'Perfect for making paper compatible with any folder',
            'price' => 6.70,
            'category_id' => $office->id
        ]);

        Product::create ([
  
            'name' => 'Lamination',
            'product_description' => '100 sheets of 9x11.5 laminating pouches to improve the presentation of documents',
            'price' => 6.70,
            'category_id' => $office->id
        ]);

        Product::create ([
  
            'name' => 'Notepad',
            'product_description' => '100 pages to store all of your inovative ideas',
            'price' => 6.70,
            'category_id' => $stat->id
        ]);

        Product::create ([
  
            'name' => 'Paint',
            'product_description' => '12 colours of paint',
            'price' => 6.70,
            'category_id' => $art->id
        ]);

        Product::create ([
  
            'name' => 'Paint Brush',
            'product_description' => '11 types of brushes to truely enhance ones creative freedom',
            'price' => 6.70,
            'category_id' => $art->id
        ]);

        Product::create ([
  
            'name' => 'Pen',
            'product_description' => 'Allow all your ideas to flow from this long lasting ball point pen',
            'price' => 6.70,
            'category_id' => $stat->id
        ]);

        Product::create ([
  
            'name' => 'Plain Cards',
            'product_description' => 'a 52 card deck, and remember ALWAYS hit on a 16, that big win is just across the road',
            'price' => 6.70,
            'category_id' => $toy->id
        ]);

        Product::create ([
  
            'name' => 'Soldier',
            'product_description' => 'Soldier76 from the hit game Overwatch 2',
            'price' => 6.70,
            'category_id' => $toy->id
        ]);

        Product::create ([
  
            'name' => 'Stapler',
            'product_description' => 'Turn singular documents into a collage',
            'price' => 6.70,
            'category_id' => $office->id
        ]);

        Product::create ([
  
            'name' => 'Staples',
            'product_description' => '5000 long lasting staples',
            'price' => 6.70,
            'category_id' => $office->id
        ]);

        Product::create ([
  
            'name' => 'The Goats Whip',
            'product_description' => 'Vroom vroom, Whatsapp car lmao',
            'price' => 6.70,
            'category_id' => $toy->id
        ]);

        Product::create ([
  
            'name' => 'Whiteboard Pens',
            'product_description' => '3 whiteboard pens to optimise your presentations',
            'price' => 6.70,
            'category_id' => $stat->id
        ]);

        Product::create ([
  
            'name' => 'Yarn',
            'product_description' => 'Around 6-7 balls of yarn to crochet anything with',
            'price' => 6.70,
            'category_id' => $art->id
        ]);
    }
}
