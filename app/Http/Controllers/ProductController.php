<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Category;

class ProductController extends Controller
{
    //

    public function productPage()
    {

        $products = Product::with('images')->get();

        return view('products', compact('products'));

    }

    public function cat($category)
    {

        $cat = Category::where('name', $category)->firstOrFail();

        $products = Product::where('category_id', $cat->id)->with('images')->get();

        return view('products', ['products' => $products, 'category' => $category]);

    }

    public function show(Product $product)
    {

        $product->load('images', 'category');

        return view('product', compact('product'));
    }

    //Haidens work

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('create', compact('categories'));

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'product_description' => 'nullable|string',
            'price' => 'required|numeric|min:0',


            'stock' => 'required|integer|min:0',
            'low_stock' => 'required|integer|min:0',

            'product_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $product = Product::create([
            'name' => $validated['name'],
            'category_id' => $validated['category_id'],
            'product_description' => $validated['product_description'] ?? null,
            'price' => $validated['price'],
        ]);


        \App\Models\Stock::create([
            'product_id' => $product->id,
            'stock' => $validated['stock'],
            'low_stock' => $validated['low_stock'],
        ]);

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $filename);

            Product_image::create([
                'product_id' => $product->id,
                'product_image' => $filename,
            ]);
        }

        return redirect('/products')->with('success', 'Product created successfully!');
    }

    // Oms work

    public function edit(Product $product) {

        $product->load('images', 'stock');

        $categories = Category::orderBy('name')->get();  // <-- add this

        return view('edit', compact('product', 'categories')); // pass to view
    }

    public function update(Request $request, Product $product){

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'product_description' => 'nullable|string',
            'price' => 'required|numeric|min:0',


            'stock' => 'required|integer|min:0',
            'low_stock' => 'required|integer|min:0',

            'product_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
 
        $product->update([
            'name' => $validated['name'],
            'category_id' => $validated['category_id'],
            'product_description' => $validated['product_description'] ?? null,
            'price' => $validated['price'],
        ]);

        $product->stock->update([
            'stock' => $validated['stock'],
            'low_stock' => $validated['low_stock'],
        ]);

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $filename);

            if($product->images->isNotEmpty()){

                $product->images()->delete();

            }

            Product_image::create([
                'product_id' => $product->id,
                'product_image' => $filename,
            ]);
        }

        return redirect()->route('product.show', $product);

    }

    public function destroy(Product $product){

       foreach($product->images as $image) {

           $path = public_path('images/products/' . $image->product_image);

           if(file_exists($path)){

            unlink($path);
        
           }
        }

        $product->images()->delete();
        $product->stock()->delete();
        $product->delete();

        return redirect()->route('products.productPage');

    } 
    
    //Suja's work
    public function search(Request $request){
        $search = $request ->input('search');

        $products = Product::where('name', 'LIKE', "%{$search}%")
        ->orWhere('product_description', 'LIKE', "%{$search}%")
        ->orderBy('created_at', 'desc')
        ->paginate(10);

         return view('search', [
        'products' => $products, 
        'search' => $search
        ]);
    }

}
