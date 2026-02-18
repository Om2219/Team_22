<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function index(){
        $favourites = Auth::user()->favouriteProducts()->with('images')->get();
        return view('favourites', compact('favourites'));
    }
    public function store(Product $product){
        Auth::user()->favouriteProducts()->syncWithoutDetaching([$product->id]);
        return back()->with('success', 'Added to wishlist');
    }
    public function destroy(Product $product)
{
    Auth::user()->favouriteProducts()->detach($product->id);
    return back()->with('success', 'removed from wishlist');
}
}
