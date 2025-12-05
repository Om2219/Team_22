<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\OrderItem;
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

    //creates an order using the information from the basket
    //takes payment info and address input from the user
    //displays price, picture, quantity, payment info, shipping address and a randomly generated reference number
    //stores the order in the database

    public function Orders(Request $details){

        $user = Auth::id();

        $ref = strtoupper(Str::random(6));

        $orderitems = Basket::join('products','basket.product_id','=','products.id')->join('product_images','products.id','=','product_images.product_id')->select('basket.*','products.name','products.price','product_images.product_image')->get();
        
        $totalPrice = $orderitems->sum(function($item) {
            return $item->price * $item->quantity;
        });

        $details->validate([ 
            'payment_method' => 'required|string',
            'shipping_address' => 'required|string'
        ]);

        $order = Order::create([
            'user_id' => $user,
            'order_ref' => $ref,
            'total' => $totalPrice,
            'payment_method' => $details->payment_method, 
            'shipping_address' => $details->shipping_address
        ]);

        foreach ($orderitems as $product) {
            $order->items()->create([
            'product_id' => $product->product_id,
            'quantity' => $product->quantity,
            'price' => $product->price
        ]);
        }

        return view('OrderPlaced', ['order' => $order, 'items' => $orderitems ]);

    }

}