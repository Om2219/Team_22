<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_image;

class ProductController extends Controller
{
    //

    public function productPage(){

        $products = Product::with('images')->get();

        return view('products', compact('products'));

    }

    public function show(Product $product){

        $product->load('images','category');

        return view('product', compact('product'));
    }
}
