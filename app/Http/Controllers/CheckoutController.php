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

class CheckoutController extends Controller
{
    

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

