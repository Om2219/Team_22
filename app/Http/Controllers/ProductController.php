<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Category;

class ProductController extends Controller
{
    //

    public function productPage(){

        $products = Product::with('images')->get();

        return view('products', compact('products'));

    }

    public function cat($category){

        $cat = Category::where('name', $category)->firstOrFail();

        $products = Product::where('category_id', $cat->id)->with('images')->get();

        return view('products', ['products' => $products, 'category' => $category]);

    }

    public function show(Product $product){

        $product->load('images','category');

        return view('product', compact('product'));
    }
}
