<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\File;
use App\Models\Product_image;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $fileloclation = public_path('images/products');


        $allFiles = File::files($fileloclation);
         
            foreach($allFiles as $file) {

                $item = Product::where('name', pathinfo($file->getFilename(), PATHINFO_FILENAME))->first();

                if($item) {
                    Product_image::create([ 'product_id' => $item->id,'product_image' => $file->getFilename()]);
                }
            }


    }
}
