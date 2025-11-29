<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\Product;
use App\Models\Product_image;

class BasketController extends Controller
{

    //displays the basket page
    //joins the basket rows with the product name, price and product image
    //returns the total price of the basket

    public function basketPage() {
        $basket = Basket::join('products','basket.product_id','=','products.id')->join('product_images','products.id','=','product_images.product_id')->select('basket.*','products.name','products.price','product_images.product_image')->get();
        
        $totalPrice = $basket->sum(function($item) {
            return $item->price * $item->quantity;
        });
        
        return view('basket', [
            'basket' => $basket,
            'totalPrice' => $totalPrice
        ]);
    }

    //adds product to the basket with the quantity specified
    //if the item added is already in the basket then the quantity is incremented by the amount specified

    public function add(Product $product, Request $request) {
        $quantity = $request->input('quantity');
        $basketItem = Basket::where('product_id', $product->id)->first();
        if ($basketItem) {
            $basketItem->quantity += $quantity;
            $basketItem->save();
        } else {
            Basket::create([
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
        }
        return redirect()->route('basket');
    }

    //removes an item from the basket by using its id in the table

    public function remove($id) {
        $basketItem = Basket::find($id);
        if ($basketItem) {
            $basketItem->delete();
        }
        return redirect()->route('basket');
    }
}

//may need more comments ???
//no idea