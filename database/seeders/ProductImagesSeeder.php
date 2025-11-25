<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\File;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $fileloclation = public_path('public/images/products');


        $allFiles = File::files($fileloclation);
         
            foreach($allFiles as $file) {

                $item = Product::where('name', pathinfo($allFiles->getFilename(), info))->first();

                if($item) {
                    ProductImage::create([ 'product_id' => $item->id,'product_image' => $item->getFilename()]);
                }
            }


    }
}
