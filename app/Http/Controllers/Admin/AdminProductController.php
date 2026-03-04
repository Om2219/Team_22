<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    // get all products, categories and stock
    public function index()
    {
        $products = Product::with(['category', 'stock'])->get();
        return response()->json($products);
    }

    // web view for products
    public function webIndex()
    {
        $products = Product::with(['category', 'stock'])->get();
        return view('admin_products', compact('products'));
    }

    // showing one product and details
    public function show($id)
    {
        $product = Product::with(['category', 'stock', 'images'])->find($id);
        
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($product);
    }

    // creating a new product with stock count
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        
        if ($request->has('stock')) {
            $product->stock()->create(['stock' => $request->stock]);
        }
        
        return response()->json($product->load('stock'), 201);
    }

    // updating a product and its stock count
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->update($request->all());
        
        if ($request->has('stock') && $product->stock) {
            $product->stock->update(['stock' => $request->stock]);
        }
        
        return response()->json($product->load('stock'));
    }

    // deleting a product, stock count and images
    public function destroy($id)
    {
        $product = Product::find($id);
        
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->images()->delete();
        $product->stock()->delete();
        $product->delete();
        
        return response()->json(['message' => 'Product deleted']);
    }

    // low stock
    public function lowStock()
    {
        $products = Product::whereHas('stock', function($q) {
            $q->where('stock', '<', 10);
        })->get();
        
        return response()->json($products);
    }

    // product search
    public function search(Request $request)
    {
        $products = Product::where('name', 'LIKE', '%' . $request->q . '%')->get();
        return response()->json($products);
    }

    // image upload for new product
    public function uploadImage(Request $request, $id)
    {
        $product = Product::find($id);
        
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        
        $path = $request->file('image')->store('products', 'public');
        $product->images()->create(['product_image' => $path]);
        return response()->json(['message' => 'Image uploaded']);
    }
}