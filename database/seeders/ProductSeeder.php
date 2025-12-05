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
            'product_description' => 'The Suja the Goat plushie is a part of a special collection on Roots. It is an ideal gift for those who want a companion to take on adventures, it features a soft fluffy fabric and is filled with poly fit for a firm but soft feel.

“PIPE DOWN PRINCESS”.

Care & Material
88% Cotten, 12% Spandex
Machine washable
',
            'price' => 67.69,
            'category_id' => $art->id
        ]);

        Product::create ([
  
            'name' => 'Yoyo',
            'product_description' => 'The Roots yoyo. Take your yoyoing to a professional level with this weighted Titanium yoyo. It goes up, it goes down, it goes ALL around. To make it return give the string a simple tug. It’s a great gift for Christmas.

Material
Titanium
',
            'price' => 6.70,
            'category_id' => $toy->id
        ]);
        
        Product::create ([
  
            'name' => 'The Whispering Woods',
            'product_description' => 'A copy of "The Whispering Woods"
            A Roots original, the creator and author of this collection was inspired by the characters inside Roots. It follows the story of the creators of Roots and how they made legendary product.

Material
paper
',
            'price' => 6.70,
            'category_id' => $book->id
        ]);

        Product::create ([
  
            'name' => 'Echoes of the Starlit Se Sea',
            'product_description' => 'A copy of "Echoes of the Starlit Se Sea"
            A Roots original, the creator and author of this collection was inspired by the characters inside Roots. It follows the story of the creators of Roots and how they made legendary product.

Material
paper
',
            'price' => 6.70,
            'category_id' => $book->id
        ]);

        Product::create ([
  
            'name' => 'Clockwork Sparrows Secret',
            'product_description' => 'A copy of "Clockwork Sparrows Secret"
            A Roots original, the creator and author of this collection was inspired by the characters inside Roots. It follows the story of the creators of Roots and how they made legendary product.

Material
paper
',
            'price' => 6.70,
            'category_id' => $book->id
        ]);

        Product::create ([
  
            'name' => 'Whispers of the Ancient Stones',
            'product_description' => 'A copy of "Whispers of the Ancient Stones"
            A Roots original, the creator and author of this collection was inspired by the characters inside Roots. It follows the story of the creators of Roots and how they made legendary product.

Material
paper
',
            'price' => 6.70,
            'category_id' => $book->id
        ]);

        Product::create ([
  
            'name' => 'the Forgotten City of Aethelgard',
            'product_description' => 'A copy of "the Forgotten City of Aethelgard"
            A Roots original, the creator and author of this collection was inspired by the characters inside Roots. It follows the story of the creators of Roots and how they made legendary product.

Material
paper
',
            'price' => 6.70,
            'category_id' => $book->id
        ]);

        Product::create ([
  
            'name' => 'Caculator',
            'product_description' => 'Swiftly overcome any mathematical hurdle with the press of a button. It features a LCD display, improved functions and easier navigation. It’s approved for Key stage 3 and 4 students recommended for those taking GCSE and A levels

Material
Carbon Fiber
',
            'price' => 6.70,
            'category_id' => $office->id
        ]);

        Product::create ([
  
            'name' => 'Canvas',
            'product_description' => 'A small frame for you to express your creativity. The world is a beautiful place, captures its essence with a Roots canvas. Its small size makes it easily portable, and its high Gsm makes painting on it feel luxurious.
•	Size: 25.4 x 20.3cm (10 x 8 inches)
•	280gsm
•	Pre-primed ready for use
•	Acid free
•	Ideal for all levels of artists and crafters
•	Perfect for oil and acrylic paints
',
            'price' => 6.70,
            'category_id' => $art->id
        ]);

        Product::create ([
  
            'name' => 'Clay',
            'product_description' => 'Mould endless creations with a variety of different colours. This is a quick dry clay which will dry in 12 hours after moulded. This clay can be used to bring your imaginations to life with endless capabilities.
1KG
',
            'price' => 6.70,
            'category_id' => $art->id
        ]);

        Product::create ([
  
            'name' => 'Elastic Bands',
            'product_description' => 'Jar of assorted elastic bands in a variety of different colours. Take your organisation to another level and surpass just the need for stationery. 
            These elastic bands can be used to create slingshots with is larger size, as well as hold your cash. (please be advised do not shoot these, can cause blindness)',
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
            'product_description' => 'perfect for extracting and illuminating any word/sentence. Organise your notes or work into sections using the variety of colours offerd. The none page leak highlighters guarentee colour wont appear on the other side or saturate your doccuments',
            'price' => 6.70,
            'category_id' => $stat->id
        ]);

        Product::create ([
  
            'name' => 'Hole Puncher',
            'product_description' => 'Perfect for making paper compatible with any folder. With the Roots hole punch you dont need to worry about the paper going everywhere it has its own bin. This hole punmcher is made of stainless steel',
            'price' => 6.70,
            'category_id' => $office->id
        ]);

        Product::create ([
  
            'name' => 'Lamination',
            'product_description' => '100 sheets of 9x11.5 laminating pouches to improve the presentation of documents.The Lamination sheets can be used for A4 paper. Roots uses recyled platics to ensure roots are eco friendly',
            'price' => 6.70,
            'category_id' => $office->id
        ]);

        Product::create ([
  
            'name' => 'Notepad',
            'product_description' => '100 pages to store all of your inovative ideas. Easy tear tops ensure you dont tear your work when pulling apart. The pages are A4 perfect for school backpacks, and has a GSM 100 ',
            'price' => 6.70,
            'category_id' => $stat->id
        ]);

        Product::create ([
  
            'name' => 'Paint',
            'product_description' => '12 colours of paint. Acrylic paint is one of the most popular paints used by artists, and its not hard to see why the versatility the paint offers is limitless.',
            'price' => 6.70,
            'category_id' => $art->id
        ]);

        Product::create ([
  
            'name' => 'Paint Brush',
            'product_description' => '11 types of brushes to truely enhance ones creative freedom. The fine-tipped paint brush delivers a smooth, even finish and provides excellent control when tackling precision',
            'price' => 6.70,
            'category_id' => $art->id
        ]);

        Product::create ([
  
            'name' => 'Pen',
            'product_description' => 'Allow all your ideas to flow from this long lasting ball point pen. Roots silver pen offer a premium user experience with its increased weight.',
            'price' => 6.70,
            'category_id' => $stat->id
        ]);

        Product::create ([
  
            'name' => 'Playing Cards',
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
            'product_description' => 'Turn singular documents into a collage. This heavy duty stapler will last 10000000 staples. Roots team spent time developing a anti jamming staple so you dont have to worry about this staple breaking. Some say this a stapler for life, from the office to your grave.',
            'price' => 6.70,
            'category_id' => $office->id
        ]);

        Product::create ([
  
            'name' => 'Staples',
            'product_description' => '5000 long lasting staples. These staples are perfect for those mountain page doccuments, the ones you can make a book out of. These staples are made of recycles metals from cans saving the turtles.',
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
            'product_description' => '
Roots 3 pack of coloured whiteboard pens can take your work to another level. Annotate, underline, understand. With the multicolours separate out your whiteboard work and bring it to life compared to the black and white. 
',
            'price' => 6.70,
            'category_id' => $stat->id
        ]);

        Product::create ([
  
            'name' => 'Yarn',
            'product_description' => 'Around 6-7 balls of yarn to crochet anything with. Bring your imagination to life with this premium cotton wool. Its 5mm thickness makes it perfect to create pushies of your own. This yarn is also durable and can be used for arts and crafts.',
            'price' => 6.70,
            'category_id' => $art->id
        ]);
    }
}
