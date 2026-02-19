<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\OrderItem;
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

    //adds product to the basket with the quantity specified
    //if the item added is already in the basket then the quantity is incremented by the amount specified

    public function add(Product $product, Request $request) {
        
        $quantity = $request->input('quantity');
        $basketItem = Basket::where('product_id', $product->id)->first();
        $stock = Stock::where('product_id', $product->id)->first();

        if ($stock->stock <= 0) {
            return back()->with('error', 'MONKEY HAS NO BANANAS!!!!!');
        }

        if ($quantity > $stock->stock) {
            return back()->with('error', 'MONKEY DOESNT HAVE ENOUGH BANANASS!!! :(');
        }


        if ($basketItem) {
            $basketItem->quantity += $quantity;

            if ($basketItem->quantity > $stock->stock) {
            return back()->with('error', 'MONKEY DOESNT HAVE ENOUGH BANANASSSSSS!!!! :(');
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
                return back()->with('error', "MONKEY DOESNT HAVE ENOUGH BANANASSSSSS!!!! :( only {$stock->stock} for {$basketItem->product->name}");
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

    // NOW PROBABLY DOES MORE THAN THAT
    // BRUZZ...

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
            'total' => $totalPrice,
            'address_line_1' => $details->address_line_1,
            'address_line_2' => $details->address_line_2,
            'postcode'       => $details->postcode,
            'city'           => $details->city,
            'card_number'    => substr($details->card_number, -4),
            'expiry_month'   => $details->expiry_month,
            'expiry_year'    => $details->expiry_year,
        ]);

        foreach ($orderitems as $product) {

            $ban = $item->is_reward ? 0 : $item->price;

            $order->items()->create([
            'product_id' => $product->product_id,
            'quantity' => $product->quantity,
            'price' => $ban
        ]);

        if ($totalPrice > 0) {
            $pointsEarned = $totalPrice * 100;
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

        return view('OrderPlaced', ['order' => $order, 'items' => $orderitems ]);

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
}