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
    
    public function create(){
       
        return view('create');
    }
    public function store(Request $request){
        $validated = $request->validate(['name' => 'required|string|max:255', 'product_description' => 'nullable|string','price' => 'required|numeric|min:0', 'category_name' => 'required|integer|max:255', 'product_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',]);
        $category = Category::firstOrCreate([
            'name' => $validated['category_name']

        ]);
        $product = Product::create(['name' => $validated['name'],'category_id'=> $category->id, 'product_description' => $validated['product_description']?? null, 'price' => $validated['price']??null,]);
        $imagePath = null;


        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');

            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('images/products'), $filename);

            $imagePath = 'images/products/' . $filename;
        }

        if($imagePath){
            Product_image::create(['product_id' => $product->id, 'product_image' => $imagePath,]);
        }
        return redirect('/products')->with('success', 'Product added succcessfully');
    }
}

