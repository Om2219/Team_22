<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Category;

class ProductController extends Controller
{
    //

    public function productPage(Request $request)
    {
    
        // $query = Product::with('images')->withAvg('reviews', 'rating');

         // Apply Sorting logic
        // if ($request->get('sort') == 'price_asc') {
        //     $query->orderBy('price', 'asc');
        // } elseif ($request->get('sort') == 'price_desc') {
        //     $query->orderBy('price', 'desc');
        // } elseif ($request->get('sort') == 'rating_desc') { 
        //     // 2. Added this case to sort by the calculated average
        //     $query->orderBy('reviews_avg_rating', 'desc');
        // } else {
        //     $query->orderBy('created_at', 'desc');
        // }

        // $products = $query->paginate(20)->withQueryString();

        // $rp = session()->get('recently_viewed', []);
        // $rvp = Product::with('images')->whereIn('id', $rp)->get();

        // return view('products', compact('products', 'rvp'));
        
    
        $query = Product::with('images')->withAvg('reviews', 'rating');

    
        $sort = $request->query('sort');

        if ($sort == 'price_asc') {
        $query->orderBy('price', 'asc');
        } elseif ($sort == 'price_desc') {
         $query->orderBy('price', 'desc');
        } elseif ($sort == 'rating_desc') {
         $query->orderBy('reviews_avg_rating', 'desc');
        } else {
        $query->orderBy('created_at', 'desc');
        }

     // Paginate results and keep the URL filters
     $products = $query->paginate(20)->withQueryString();

    // Fetch recently viewed products from session
     $recentIds = session()->get('recently_viewed', []);
     $rvp = Product::with('images')->whereIn('id', $recentIds)->get();

     return view('products', compact('products', 'rvp'));

    }

    public function cat(Request $request, $category) 
    {

        $cat = Category::where('name', $category)->firstOrFail();

    
        $query = Product::where('category_id', $cat->id)->with('images');

    
        if ($request->get('sort') == 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($request->get('sort') == 'price_desc') {
            $query->orderBy('price', 'desc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

            $products = $query->paginate(20)->withQueryString();

            $rp = session()->get('recently_viewed', []);
            $rvp = Product::with('images')->whereIn('id', $rp)->get();

        return view('products', ['products' => $products, 'category' => $category, 'rvp' => $rvp]);

    }

    public function show(Product $product)
    {

        $product->load('images', 'category');

        $rv = session()->get('recently_viewed', []);

        $rv = array_diff($rv, [$product->id]);

        array_unshift($rv, $product->id);

        $rv = array_slice($rv, 0, 4);

         session()->put('recently_viewed', $rv);

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

            'price' => 'nullable|numeric|min:0',
            'points_cost' => 'nullable|integer|min:1',
            'is_reward' => 'nullable|boolean',

        ]);

        $product = Product::create([
            'name' => $validated['name'],
            'category_id' => $validated['category_id'],
            'product_description' => $validated['product_description'] ?? null,
            'price' => $validated['price'],
            'is_reward' => $request->has('is_reward'),
            'points_cost' => $request->is_reward ? $validated['points_cost'] : null,
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

    // This fucnion returns all products with their stock ammount of that product
    public function stockChecker(){

        $products = Product::with('stock')->orderBy('name')->get();
        return redirect()->route('admin.products');

    }

    // This fucnion restocks products to 67 if they are empty
    public function restock(Product $product){

        if(!$product->stock){
            return redirect()->route('stock.index')->with('error', 'Silly Monkey ate all the bananas🦧');
        }

        $product->stock->update(['stock' => 67]);

        return redirect()->route('admin.products')->with('success', $product->name .' has been restocked successfully');

    }

    // This fucnion lets admin restock products to specific amoounts
    public function updateStock(Request $request, Product $product){

        $request->validate([ 'stock' => 'required|integer|min:0']);

        if(!$product->stock){
            return redirect()->route('stock.index')->with('error', 'Silly Monkey ate all the bananas🦧');
        }

        $product->stock->update(['stock' => $request->stock]);

        return redirect()->route('admin.products')->with('success', 'Stock updated successfully for '. $product->name);

    }
    // This fucnion lets admin edit existing products to change images or stock
    public function edit(Product $product) {

        $product->load('images', 'stock', 'reviews.user');

        $categories = Category::orderBy('name')->get();  // <-- add this

        return view('edit', compact('product', 'categories')); // pass to view
    }
    // This fucnion lets admin update products name category and descripton
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

    // This fucnion deletes all data on a specific product
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
    // public function search(Request $request)
    // {
    //     $search = $request->input('search');

    //     if (!$search) {
    //         return redirect()->back();
    //     }

        
    //     $query = Product::where('name', 'LIKE', "{$search}%")
    //                     ->withAvg('reviews', 'rating');

   
    //     if ($request->get('sort') == 'price_asc') {
    //         $query->orderBy('price', 'asc');
    //     } elseif ($request->get('sort') == 'price_desc') {
    //         $query->orderBy('price', 'desc');
    //     } elseif ($request->get('sort') == 'rating_desc') {
    //         // This 'reviews_avg_rating' column is created automatically by withAvg()
    //         $query->orderBy('reviews_avg_rating', 'desc');
    //     } else {
        
    //         $query->orderBy('created_at', 'desc');
    //     }

    //     $products = $query->paginate(10);

    //     return view('search', compact('products', 'search'));
    // }

    
    //Suja's work - Improved search with sorting and pagination
    public function search(Request $request)
    {
    $search = $request->input('search');
    
    // Redirect back if search is empty
    if (empty($search)) {
        return redirect()->back();
    }


    $query = Product::where('name', 'LIKE', "{$search}%")
                    ->withAvg('reviews', 'rating');

    $sort = $request->query('sort');

    
    if ($sort == 'price_asc') {
        $query->orderBy('price', 'asc');
    } elseif ($sort == 'price_desc') {
        $query->orderBy('price', 'desc');
    } elseif ($sort == 'rating_desc') {
     
        $query->orderBy('reviews_avg_rating', 'desc');
    } else {
    
        $query->orderBy('created_at', 'desc');
    }

    
    $products = $query->paginate(10)->withQueryString();

    return view('search', compact('products', 'search'));
    }
    

}
