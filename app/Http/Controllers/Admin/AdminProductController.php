<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminProductController extends Controller {

    // Get all products, categories and stock
    public function index() {
        $products = Product::with(['category', 'stock'])->get();
        return response()->json($products);
    }

    // Web view for products - added searching and filters
    public function webIndex(Request $request) {
        $query = Product::with(['category', 'stock', 'images']);

        // search by name
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // filter by category
        if ($request->category) {
            $query->where('category_id', $request->category);
        }

        // Filter by stock (changes based on the product so had to make it variable)
        if ($request->stock_status == 'low') {
            $query->whereHas('stock', function($q) {
                $q->whereColumn('stock', '<=', 'low_stock');
            });
        } elseif ($request->stock_status == 'out') {
            $query->whereHas('stock', function($q) {
                $q->where('stock', 0);
            });
        } elseif ($request->stock_status == 'in') {
            $query->whereHas('stock', function($q) {
                $q->where('stock', '>', 0);
            });
        }

        // Sorting for the filters, the default is ordering by id but also have price ordering
        $sort = $request->get('sort');
        if($sort == 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif($sort == 'price_desc') {
            $query->orderBy('price', 'desc');
        } else {
            $query->orderBy('id', 'asc');
        }

        // Categorites for all products
        $categories = Category::orderBy('name')->get();
        // 20 items per page (like for product pages)
        $products = $query->paginate(20)->withQueryString();
        return view('admin_products', compact('products', 'categories'));
    }

    // Showing a product and the details
    public function show($id) {
        $product = Product::with(['category', 'stock', 'images'])->find($id);
        // Error message if the product doesn't exist
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($product);
    }

    // Creating a new product with stock count
    public function store(Request $request) {
        $product = Product::create($request->all());
        // If we add stock then we are creating the product
        if ($request->has('stock')) {
            $product->stock()->create(['stock' => $request->stock]);
        }
        return response()->json($product->load('stock'), 201);
    }

    // updating a product and its stock count
    public function update(Request $request, $id) {
        $product = Product::find($id);
        // Error message if we can't find the product
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $product->update($request->all());
        // Update the stock count if changed
        if ($request->has('stock') && $product->stock) {
            $product->stock->update(['stock' => $request->stock]);
        }
        
        return response()->json($product->load('stock'));
    }

    // Deleting a product, stock count and images
    public function destroy($id) {
        $product = Product::find($id);
        // Error message if the product doesn't exist
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        // Deleting all fields when deleting the product
        $product->images()->delete();
        $product->stock()->delete();
        $product->delete();
        return response()->json(['message' => 'Product deleted']);
    }

    // Managing low stock - changes based on product because admins can set it
    public function lowStock() {
        $products = Product::with('stock')->get()->filter(function($product) {
            return $product->stock && $product->stock->stock <= $product->stock->low_stock;
        })->values();
        return response()->json($products);
    }

    // Image upload for a new product
    public function uploadImage(Request $request, $id) {
        $product = Product::findOrFail($id);
        $path = $request->file('image')->store('products', 'public');
        // Connecting the image and the product
        $product->images()->create(['product_image' => $path]);
        return response()->json(['message' => 'Image uploaded']);
    }
}