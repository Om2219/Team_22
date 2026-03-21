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

        $rewards = Category::where('name', 'rewards')->first();

        //WHATEVER YOU DO, DONT MESS WITH THE DESCRIPTION INDENTATION
        //IT BREAKS OTHERWISE

        Product::create ([
  
            'name' => 'Suja the Goat',
            'product_description' => <<<TEXT
        The Suja the Goat plushie is a part of a special collection on Roots. It is an ideal gift for those who want a companion to take on adventures, or for those who want a fluffy friend to chill out with. It features a soft plush fabric and is filled with poly fit for a firm but soft feel.

        Complete in box with friendly “PIPE DOWN PRINCESS” message.

        Care & Material:
        88% cotton, 12% spandex
        Machine washable
        TEXT,
            'price' => 19.99,
            'category_id' => $toy->id,
            'is_reward' => false,
            'points_cost' => null,
        ]);

        Product::create ([
  
            'name' => 'Yoyo',
            'product_description' => <<<TEXT
        The Roots yoyo. 
            
        Take your yoyoing to a professional level with this weighted Titanium yoyo. It goes up, it goes down, it goes ALL around. To make it return give the string a simple tug. It's a great gift for all ages.

        Features:
        • Titanium construction
        • Long lasting and flexible string
        • Perfect for all ages
        TEXT,
            'price' => 14.99,
            'category_id' => $toy->id,
            'is_reward' => false,
            'points_cost' => null,
        ]);
        
        Product::create ([

            'name' => 'The Whispering Woods',
            'product_description' => <<<TEXT
        A copy of "The Whispering Woods", the first entry in the "Roots Originals" series.  
        
        In the quiet depths of an enigmatic forest, the first sparks of Roots are born. This opening installment follows the founders as they uncover hidden inspiration in nature itself, where every rustle and shadow holds a secret waiting to be transformed into something extraordinary.
        TEXT,
            'price' => 7.99,
            'category_id' => $book->id,
            'is_reward' => false,
            'points_cost' => null,
        ]);

        Product::create ([
  
            'name' => 'Echoes of the Starlit Se Sea',
            'product_description' => <<<TEXT
        A copy of "Echoes of the Starlit Se Sea", the second entry in the "Roots Originals" series.
        
        Guided by distant horizons, the creators venture beyond the familiar. Amid shimmering waters and celestial reflections, they refine their vision, learning to navigate uncertainty and harness the power of imagination to shape their newest breakthrough.
        TEXT,
            'price' => 7.99,
            'category_id' => $book->id,
            'is_reward' => false,
            'points_cost' => null,
        ]);

        Product::create ([
  
            'name' => 'Clockwork Sparrows Secret',
            'product_description' => <<<TEXT
        A copy of "Clockwork Sparrows Secret", the third entry in the "Roots Originals" series.
        
        Innovation takes center stage as the team deciphers the mechanics behind their growing success. Through trial, failure, and ingenious design, they unlock the secret that propels their creations from promising ideas into revolutionary products.
        TEXT,
            'price' => 7.99,
            'category_id' => $book->id,
            'is_reward' => false,
            'points_cost' => null,
        ]);

        Product::create ([
  
            'name' => 'Whispers of the Ancient Stones',
            'product_description' => <<<TEXT
        A copy of "Whispers of the Ancient Stones", the fourth entry in the "Roots Originals" series.
        
        The journey deepens as the founders confront legacy, tradition, and the weight of history. Among ancient ruins and enduring symbols, they discover that true greatness lies in blending timeless wisdom with bold, modern thinking.
        TEXT,
            'price' => 7.99,
            'category_id' => $book->id,
            'is_reward' => false,
            'points_cost' => null,
        ]);

        Product::create ([
  
            'name' => 'The Forgotten City of Aethelgard',
            'product_description' => <<<TEXT
        A copy of "The Forgotten City of Aethelgard", the fifth and final entry in the "Roots Originals" series.
        
        In a lost city filled with untold stories, the creators face their ultimate test. Here, past and future collide as they solidify their legacy, transforming Roots into an enduring symbol of innovation, resilience, and visionary craftsmanship.
        TEXT,
            'price' => 7.99,
            'category_id' => $book->id,
            'is_reward' => false,
            'points_cost' => null,
        ]);

        Product::create ([
  
            'name' => 'Calculator',
            'product_description' => <<<TEXT
        Swiftly overcome any mathematical hurdle with the press of a button. It’s approved for Key stage 3 and 4 students, and recommended for those taking GCSE and A level exams.

        Features:
        • LCD display
        • Improved trigonometry functions over previous models 
        • Easy navigation
        TEXT,
            'price' => 9.99,
            'category_id' => $office->id,
            'is_reward' => false,
            'points_cost' => null,
        ]);

        Product::create ([
  
            'name' => 'Canvas',
            'product_description' => <<<TEXT
        This high-quality canvas provides a smooth, durable surface perfect for all your artistic endeavors. Ideal for painting, sketching, and mixed media projects, it’s designed to hold acrylic, oil, and watercolor paints with ease. Whether you're a professional artist or a beginner, this canvas ensures vibrant colors and sharp details, making it an essential tool for creating your next masterpiece. Stretching over a sturdy wooden frame, it’s ready for immediate use, offering both versatility and reliability for any creative project.

        Features:
        • Size: 25.4 x 20.3cm (10 x 8 inches)
        • 280gsm
        • Pre-primed ready for use
        • Acid free
        TEXT,
            'price' => 7.99,
            'category_id' => $art->id,
            'is_reward' => false,
            'points_cost' => null,
        ]);

        Product::create ([
  
            'name' => 'Clay',
            'product_description' => <<<TEXT
        This premium clay set features a vibrant assortment of colors, perfect for sculpting, molding, and crafting a wide range of creations. Each set includes a variety of soft, easy-to-work-with clays that are ideal for artists of all skill levels.
        
        Features:
        • Fast drying (12 hours)
        • Multiple colours
        TEXT, 
            'price' => 19.99,
            'category_id' => $art->id,
            'is_reward' => false,
            'points_cost' => null,
        ]);

        Product::create ([
  
            'name' => 'Elastic Bands',
            'product_description' => <<<TEXT
        Jar of assorted elastic bands in a variety of different colours. Take your organisation to another level and surpass just the need for stationery. 
        
        These elastic bands can be used to create slingshots with their large size, as well as hold your cash.    
        TEXT,    
            'price' => 4.99,
            'category_id' => $stat->id,
            'is_reward' => false,
            'points_cost' => null,
        ]);

        Product::create ([
  
            'name' => 'Fidget Spinner',
            'product_description' => <<<TEXT
        A fidget toy that provides endless engagement. Throw it back (pause) to 2017 and experience our nostalgic twist on the timeless trend from nearly a decade ago. Yes you are old.  
        TEXT,
            'price' => 4.99,
            'category_id' => $toy->id,
            'is_reward' => false,
            'points_cost' => null,
        ]);

        Product::create ([
  
            'name' => 'Highlighters',
            'product_description' => <<<TEXT
        This vibrant set of highlighters brings color and precision to your notes, sketches, and study sessions. Featuring a range of bold, fluorescent shades, these highlighters are designed for smooth, consistent application on a variety of paper types.
        
        Features:
        • Set of 4
        • Non-leak (won't bleed through page)
        • Long-lasting
        TEXT,
            'price' => 5.99,
            'category_id' => $stat->id,
            'is_reward' => false,
            'points_cost' => null,
        ]);

        Product::create ([
  
            'name' => 'Hole Punch',
            'product_description' => <<<TEXT
        This sturdy hole punch is a must-have tool for anyone looking to organize and personalize documents with ease. Designed for precision, it effortlessly punches clean, uniform holes in paper, making it perfect for creating binder-ready sheets or crafting projects.

        Features:
        • Stainless steel construction
        • Ideal for home, office or school use
        TEXT,
            'price' => 6.99,
            'category_id' => $office->id,
            'is_reward' => false,
            'points_cost' => null,
        ]);

        Product::create ([
  
            'name' => 'Lamination',
            'product_description' => <<<TEXT
        This set of lamination pouches provides a professional, glossy finish to all your important documents, photos, and artwork. Designed for easy use with any standard laminating machine, these pouches ensure a durable, long-lasting seal that protects your items from wear, tear, and fading.

        Features:
        • 100 pouches, 9in x 11.5in
        • Perfect for A4 sheets of paper
        • Eco-friendly construction with recycled plastics
        TEXT,
            'price' => 9.99,
            'category_id' => $office->id,
            'points_cost' => null,
        ]);

        Product::create ([
  
            'name' => 'Notepad',
            'product_description' => <<<TEXT
        This classic notepad is your go-to companion for jotting down ideas, making lists, or keeping track of important notes. With a smooth, high-quality paper surface that works perfectly with pens, pencils, or markers, it’s ideal for everything from quick sketches to detailed writing.

        Features:
        • 100 lined pages
        • A4 size
        • 100 GSM
        TEXT,    
            'price' => 3.99,
            'category_id' => $stat->id,
            'is_reward' => false,
            'points_cost' => null,
        ]);

        Product::create ([
  
            'name' => 'Paint',
            'product_description' => <<<TEXT
        This set of 12 vibrant acrylic paints is perfect for artists of all levels, offering a rich range of colors to bring your creative vision to life. Each paint is highly pigmented, providing smooth, opaque coverage on canvas, wood, paper, and more. With a fast-drying formula, you can layer and blend your colors with ease, creating stunning works of art in no time.

        Features:
        • Set of 12
        • Various colours
        • Acrylic paint
        • Fast drying
        TEXT,
            'price' => 12.99,
            'category_id' => $art->id,
            'is_reward' => false,
            'points_cost' => null,
        ]);

        Product::create ([
  
            'name' => 'Paint Brush',
            'product_description' => <<<TEXT
        This set of 11 high-quality paintbrushes is designed to meet all your artistic needs, from detailed fine lines to bold, sweeping strokes. With a variety of brush shapes and sizes, including flat, round, and filbert, you'll have the perfect tool for every painting technique. Whether you're working with acrylics, oils, or watercolors, these brushes provide smooth, precise application and excellent color retention.

        Features:
        • 11 brush types
        • Ergonomic handles
        • Can be used with all types of paint
        TEXT,
            'price' => 9.99,
            'category_id' => $art->id,
            'is_reward' => false,
            'points_cost' => null,
        ]);

        Product::create ([
  
            'name' => 'Pen',
            'product_description' => <<<TEXT
        This sleek silver ballpoint pen combines style and functionality in one elegant design. The smooth, consistent ink flow ensures a seamless writing experience, whether you're jotting down notes, signing documents, or sketching ideas. The durable, high-quality ballpoint tip delivers crisp, precise lines, while the silver finish adds a touch of sophistication to your desk or stationery collection.
        TEXT,
            'price' => 1.49,
            'category_id' => $stat->id,
            'is_reward' => false,
            'points_cost' => null,
        ]);

        Product::create ([
  
            'name' => 'Playing Cards',
            'product_description' => <<<TEXT
        This classic deck of playing cards is perfect for hours of entertainment, whether you’re playing games with friends, practicing card tricks, or collecting for your game night essentials. Crafted with durable, high-quality cardstock, each card is designed for smooth shuffling and easy handling.    
        TEXT,
            'price' => 2.99,
            'category_id' => $toy->id,
            'is_reward' => false,
            'points_cost' => null,
        ]);

        Product::create ([
  
            'name' => 'Soldier',
            'product_description' => <<<TEXT
        This futuristic toy soldier brings high-tech precision and detailed craftsmanship to your collection. Equipped with advanced armor and sleek weaponry, this soldier is designed to stand strong in any battle scenario. The highly articulated joints allow for dynamic poses, while the intricate details of the armor and gear add a realistic touch to your display.    
        TEXT,
            'price' => 2.49,
            'category_id' => $toy->id,
            'is_reward' => false,
            'points_cost' => null,
        ]);

        Product::create ([
  
            'name' => 'Stapler',
            'product_description' => <<<TEXT
        This sturdy stapler is built for reliable, everyday use, offering smooth and effortless stapling for all your documents. Its sleek, ergonomic design ensures a comfortable grip, while the compact size makes it easy to store on your desk or take on the go.    
        
        Features:
        • Strong construction
        • Long lasting mechanism
        TEXT,
            'price' => 4.99,
            'category_id' => $office->id,
            'is_reward' => false,
            'points_cost' => null,
        ]);

        Product::create ([
  
            'name' => 'Staples',
            'product_description' => <<<TEXT
        This set of 5000 staples ensures you’ll always have the supplies you need to keep your documents neatly fastened. Compatible with most standard staplers, these durable, high-quality staples provide strong, reliable hold and smooth, consistent performance.    
        
        Features:
        • 5000 staples
        • Great for bulk use in office environments
        • Pre-packaged and ready to be installed in every stapler
        TEXT,
            'price' => 6.99,
            'category_id' => $office->id,
            'is_reward' => false,
            'points_cost' => null,
        ]);

        Product::create ([
  
            'name' => "The Goat's Whip",
            'product_description' => <<<TEXT
        Introducing The Goat's Whip, a high-speed toy car built for thrill-seekers and collectors alike. With its sleek, aerodynamic design and bold, striking colors, this miniature powerhouse is ready to race through any track or imaginative adventure. And best of all, it's the signature vehicle of choice for none other than the GOAT. 
        
        Features:
        • 1/24 scale
        • Premium construction
        • Rapid acceleration
        • GOAT certified
        TEXT,
            'price' => 12.99,
            'category_id' => $toy->id,
            'is_reward' => false,
            'points_cost' => null,
        ]);

        Product::create ([
  
            'name' => 'Whiteboard Pens',
            'product_description' => <<<TEXT
        This set of whiteboard pens is perfect for organizing, brainstorming, and creating vibrant presentations on any dry-erase surface. Featuring a range of bold, vivid colors, these pens offer smooth, consistent writing and easy erasing, making them ideal for classrooms, offices, or creative spaces.    
        TEXT,
            'price' => 4.99,
            'category_id' => $stat->id,
            'is_reward' => false,
            'points_cost' => null,
        ]);

        Product::create ([
  
            'name' => 'Yarn',
            'product_description' => <<<TEXT
        This set of 7 vibrant balls of yarn is perfect for crafters and knitters of all skill levels. With a rich selection of colors, each ball offers soft, durable, and easy-to-work-with material, making it ideal for knitting, crocheting, or weaving your next project. Whether you're creating cozy scarves, colorful blankets, or intricate accessories, this versatile yarn set provides the variety and quality you need to bring your creative ideas to life.    
        TEXT,
            'price' => 24.99,
            'category_id' => $art->id,
            'is_reward' => false,
            'points_cost' => null,
        ]);

        Product::create ([
  
            'name' => "Suja the Goat - 'GOLDEN EDITION'",
            'product_description' => <<<TEXT
        The Suja the Goat plushie is a part of a special collection on Roots. It is an ideal gift for those who want a companion to take on adventures, or for those who want a fluffy friend to chill out with. It features a soft plush fabric and is filled with poly fit for a firm but soft feel.    
        
        This particular plushie is the 'GOLDEN EDITION', a special version of the Suja the Goat plushie that can only be purchased using Roots Reward Points.

        Complete in box with friendly “PIPE DOWN PRINCESS” message, and specific with the 'GOLDEN EDITION', a nice thank you message from the GOAT himself.

        Care & Material:
        88% cotton, 12% spandex
        Machine washable
        TEXT,
            'price' => null,
            'category_id' => $rewards->id,
            'is_reward' => true,
            'points_cost' => 10000,
        ]);
        
        
        Product::create([
            'name' => "The Goat's Whip - 'GOLDEN EDITION'",
            'product_description' => <<<TEXT
        Introducing The Goat's Whip, a high-speed toy car built for thrill-seekers and collectors alike. With its sleek, aerodynamic design and bold, striking colors, this miniature powerhouse is ready to race through any track or imaginative adventure. And best of all, it's the signature vehicle of choice for none other than the GOAT. 
        
        This particular model is the 'GOLDEN EDITION', a special version of The Goat's Whip that can only be purchased using Roots Reward Points.

        Features:
        • 1/24 scale
        • Premium construction
        • Rapid acceleration
        • GOAT certified
        TEXT, 
            'price' => null,
            'category_id' => $rewards->id,
            'is_reward' => true,
            'points_cost' => 7500,
        ]);


        Product::create([
            'name' => "Canvas - 'GOLDEN EDITION'",
            'product_description' => <<<TEXT
        This high-quality canvas provides a smooth, durable surface perfect for all your artistic endeavors. Ideal for painting, sketching, and mixed media projects, it’s designed to hold acrylic, oil, and watercolor paints with ease. Whether you're a professional artist or a beginner, this canvas ensures vibrant colors and sharp details, making it an essential tool for creating your next masterpiece. Stretching over a sturdy wooden frame, it’s ready for immediate use, offering both versatility and reliability for any creative project.

        This particular model is the 'GOLDEN EDITION', a special version of our normal canvas that can only be purchased using Roots Reward Points.

        Features:
        • Size: 25.4 x 20.3cm (10 x 8 inches)
        • 280gsm
        • Pre-primed ready for use
        • Acid free
        • Golden frame for major aura points
        TEXT,
            'price' => null,
            'category_id' => $rewards->id,
            'is_reward' => true,
            'points_cost' => 3000,
        ]);


        Product::create([
            'name' => "The Whispering Woods - 'GOLDEN EDITION'",
            'product_description' => <<<TEXT
        A copy of "The Whispering Woods", the first entry in the "Roots Originals" series.  
        
        In the quiet depths of an enigmatic forest, the first sparks of Roots are born. This opening installment follows the founders as they uncover hidden inspiration in nature itself, where every rustle and shadow holds a secret waiting to be transformed into something extraordinary.

        This particular model is the 'GOLDEN EDITION', a special version of The Whispering Woods that can only be purchased using Roots Reward Points.

        The 'GOLDEN EDITION' comes complete with a golden hardback cover as well as a golden stand inscribed with the title of the book for display purposes.
        TEXT,
            'price' => null,
            'category_id' => $rewards->id,
            'is_reward' => true,
            'points_cost' => 1500,
        ]);


        Product::create([
            'name' => "Calculator - 'GOLDEN EDITION'",
            'product_description' => <<<TEXT
        Swiftly overcome any mathematical hurdle with the press of a button. It’s approved for Key stage 3 and 4 students, and recommended for those taking GCSE and A level exams.

        This particular model is the 'GOLDEN EDITION', a special version of our normal calculator that can only be purchased using Roots Reward Points.

        Features:
        • LCD display
        • Improved trigonometry functions over previous models 
        • Easy navigation
        • Blinged out for all your exam needs
        TEXT,
            'price' => null,
            'category_id' => $rewards->id,
            'is_reward' => true,
            'points_cost' => 1000,
        ]);


    }
}
