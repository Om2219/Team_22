<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Refund;
use App\Models\Basket;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Stock;
use App\Models\Voucher;

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
        
        $discount = 0;
        $voucherCode = session('voucher.code');

        if ($voucherCode) {
        $voucher = Voucher::where('code', $voucherCode)->where('active', true)->first();

        if ($voucher) {
            if ($voucher->type === 'percent') {
                $discount = ($totalPrice * $voucher->value) / 100;
            } else {
                $discount = $voucher->value;
            }
        }
    }

    $finalTotal = max(0, $totalPrice - $discount);
        return view('basket', [
            'basket' => $basket,
            'totalPrice' => $totalPrice,
            'voucher' => $voucher ?? null,
            'discount' => $discount,
            'finalTotal' => $finalTotal,
        ]);
    }

    //checks if the user is logged in, if not redirects to login
    //if logged in, you can checkout
    //gets info from basket and shows order summary on checkout
    //also shows the effects of vouchers on total price (finalTotal)

    public function checkoutPage() {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $basket = Basket::join('products','basket.product_id','=','products.id')
            ->join('product_images','products.id','=','product_images.product_id')
            ->select('basket.*','products.name','products.price','product_images.product_image')
            ->get();

        $totalPrice = $basket->sum(function($item) {
            return $item->price * $item->quantity;
        });

        $discount = 0;
        $voucher = null;

        $voucherCode = session('voucher.code') ?? null;

        if ($voucherCode) {
            $voucher = Voucher::where('code', $voucherCode)
                ->where('active', true)
                ->first();

            if ($voucher) {
                $discount = $voucher->type === 'percent'
                    ? ($totalPrice * $voucher->value) / 100
                    : $voucher->value;
            }
        }

        $finalTotal = max(0, $totalPrice - $discount);

        return view('checkout', compact('basket', 'totalPrice', 'discount', 'finalTotal', 'voucher'));
    }

    //adds product to the basket with the quantity specified
    //if the item added is already in the basket then the quantity is incremented by the amount specified

    public function add(Product $product, Request $request) {
        
        $quantity = $request->input('quantity');
        $basketItem = Basket::where('product_id', $product->id)->first();
        $stock = Stock::where('product_id', $product->id)->first();

        if ($stock->stock <= 0) {
            return redirect()->back()->withErrors(['stock' => 'This product is no longer in stock.',]);
        }

        if ($quantity > $stock->stock) {
            return redirect()->back()->withErrors(['stock' => 'There is not enough stock to fulfil your order. Please select a lesser quantity.',]);
        }


        if ($basketItem) {
            $basketItem->quantity += $quantity;

            if ($basketItem->quantity > $stock->stock) {
            return redirect()->back()->withErrors(['stock' => 'There is not enough stock to fulfil your order. Please select a lesser quantity.',]);
        }

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

    public function update(Request $request) {
 
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $basketItem = Basket::where('product_id', $productId)->first();
        $stock = Stock::where('product_id', $productId)->first();

            if ($quantity > $stock->stock) {
                return back()->with('error', "There is not enough stock to fulfil your order. Please select a lesser quantity.");
            }


            if ($quantity < 1) {
                $basketItem->delete();
            } else {
                $basketItem->quantity = $quantity;
                $basketItem->save();
            }
        
         return redirect()->route('basket');

    }

    //creates an order using the information from the basket
    //takes payment info and address input from the user
    //displays price, picture, quantity, payment info, shipping address and a randomly generated reference number
    //stores the order in the database
    //also adds reward points based on total spend
    //100 points per £ spent

    public function Orders(Request $details){

        $user = Auth::id();

        $ref = strtoupper(Str::random(6));

        $orderitems = Basket::join('products','basket.product_id','=','products.id')->join('product_images','products.id','=','product_images.product_id')->select('basket.*','products.name','products.price', 'products.is_reward','products.points_cost','product_images.product_image')->get();
        
        $totalPrice = 0;
        $tptd = 0;

        foreach ($orderitems as $item) {

            if ($item->is_reward) {
                $tptd += $item->points_cost * $item->quantity;
            } else {
                $totalPrice += $item->price * $item->quantity;
            }
        }

        $discount = 0;
        $voucher = null;
        $voucherCode = session('voucher.code') ?? null;

        if ($voucherCode) {
            $voucher = Voucher::where('code', $voucherCode)
                ->where('active', true)
                ->first();

            if ($voucher) {
                $discount = $voucher->type === 'percent'
                    ? ($totalPrice * $voucher->value) / 100
                    : $voucher->value;
            }
        }

        $finalTotal = max(0, $totalPrice - $discount);

        $details->validate([
            'address_line_1' => 'required|string|max:100',
            'address_line_2' => 'nullable|string|max:100',
            'postcode'       => 'required|string|max:10',
            'city'           => 'required|string|max:100',
            'card_number'    => 'required|digits_between:13,20',
            'expiry_month'   => 'required',
            'expiry_year'    => 'required',
            'security_code'  => 'required|digits_between:3,4',
        ]);

        $uM = \App\Models\User::find($user);

        if ($tptd > 0) {

            if ($uM->points < $tptd) {
                return redirect()->route('basket')->with('error', 'NO BANANA NO BUSINESSSS!!!!!🙈');
            }

            $uM->points -= $tptd;
            $uM->save();
        }

        $order = Order::create([
            'user_id' => $user,
            'order_ref' => $ref,
            'total' => $finalTotal,
            'address_line_1' => $details->address_line_1,
            'address_line_2' => $details->address_line_2,
            'postcode'       => $details->postcode,
            'city'           => $details->city,
            'card_number'    => substr($details->card_number, -4),
            'expiry_month'   => $details->expiry_month,
            'expiry_year'    => $details->expiry_year,
        ]);

        foreach ($orderitems as $product) {

            $ban = $product->is_reward ? 0 : $product->price;

            $order->items()->create([
                'product_id' => $product->product_id,
                'quantity' => $product->quantity,
                'price' => $ban
            ]);

            if ($totalPrice > 0) {
                $pointsEarned = $finalTotal * 100;
                $uM->points += $pointsEarned;
                $uM->save();
            }


            $stock = Stock::where('product_id',$product->product_id)->first();

            if ($stock->stock >= $product->quantity){
                $stock->stock -= $product->quantity;
                $stock->save();
            } else {
                return back();
            }
        }

        Basket::truncate();
        session()->forget('voucher');

        return view('OrderPlaced', [
            'order' => $order,
            'items' => $orderitems,
            'totalPrice' => $totalPrice,
            'discount' => $discount,
            'voucher' => $voucher
        ]);

    }
    
    public function applyVoucher(Request $request){
    $request->validate([
        'code'=>'required|string'
    ]);
    $code = strtoupper(trim($request->code));
    $voucher = Voucher::where('code', $code)->where('active', true)->first();
    if (!$voucher){
        return back()->with('voucher_error', 'Wrong voucher code');

    }
    session()->put('voucher', ['code' => $voucher->code,]);
    return back()->with('voucher_success', 'Voucher has been applied');

    }
    public function removeVoucher(){
        session()->forget('voucher');
        return back()->with('voucher_success', 'Voucher removed');

    }

    //this method checks the current user id that is logged in
    //and shows the orders for that user in the order page

    public function ordersPage() {
        $orders = Order::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('order', compact('orders'));
    }

    //this method allows for each order to have its own individual page
    //based on its reference number
    //it takes the order details from the tables
    //as well as all product info and prices and such
    //and displays it in the same way as the orderPlaced page does

    public function orderDetails($ref) {
        $order = Order::where('order_ref', $ref)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $items = OrderItem::join('products', 'order_items.product_id', '=', 'products.id')
            ->join('product_images', 'products.id', '=', 'product_images.product_id')
            ->select(
                'order_items.*',
                'products.name',
                'product_images.product_image'
            )
            ->where('order_items.order_id', $order->id)
            ->get();

        return view('orderDetails', compact('order', 'items'));
    }

    //shows the refund form in order details
    //also shows order summary
    //if the order is already being refunded or has already been refunded
    //then the user cannot refund again

    public function showRefundForm($ref) {
        $order = Order::where('order_ref', $ref)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

        if ($order->status == 'Pending Refund') {
            return redirect()->back()->withErrors(['order_ref' => "This order is already being refunded."]);
        }

        if ($order->status == 'Refunded') {
            return redirect()->back()->withErrors(['order_ref' => "This order has already been refunded."]);
        }

        $items = OrderItem::join('products', 'order_items.product_id', '=', 'products.id')
            ->join('product_images', 'products.id', '=', 'product_images.product_id')
            ->select(
                'order_items.*',
                'products.name',
                'product_images.product_image'
            )
            ->where('order_items.order_id', $order->id)
            ->get();

        return view('refund', compact('order', 'items'));
    }

    //submits refund to refund table in database
    //checks if the item already has a refund request in table
    //checks if order is outside of refund policy (14 days)
    //then sets order status to Pending Refund

    public function submitRefund(Request $request, $ref) {
        $order = Order::where('order_ref', $ref)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

        if (Refund::where('order_id', $order->id)->exists()) {
            return redirect()->back()->withErrors(['order_ref' => 'This order already has a refund request.']);
        }

        $request->validate([
            'reason' => 'required|string',
            'detailed_reason' => 'nullable|string',
        ]);

        $orderTime = strtotime($order->created_at);
        $currentTime = time();
        $diff = $currentTime - $orderTime;
        $diffDays = $diff / 86400;

        if ($diffDays > 14) {
            return redirect()->back()->withErrors(['order_ref' => 'Sorry, you cannot request a refund for this order as it is beyond the 14-day refund window.']);
        }

        Refund::create([
            'order_id' => $order->id,
            'reason' => $request->reason,
            'detailed_reason' => $request->detailed_reason,
        ]);

        $order->status = 'Pending Refund';
        $order->save();

        return redirect()->route('orders.details', $order->order_ref)->with('success', 'Your refund request has been submitted.');
    }
}