<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\Product;

class BasketController extends Controller
{

    //displays the basket page
    //joins the basket rows with the product name and price

    public function basketPage() {
        $basket = Basket::join('products', 'basket.product_id', '=', 'products.id')->select('basket.*', 'products.name', 'products.price')->get();
        return view('basket', ['basket' => $basket]);
    }

    //adds product to the basket with the quantity specified in the form on the product page

    public function add(Product $product, Request $request) {
        $quantity = $request->input('quantity');
        Basket::create([
            'product_id' => $product->id,
            'quantity' => $quantity,
        ]);
        return redirect()->route('basket');
    }
}


//may need more comments ???
//no idea