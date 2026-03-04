<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // to get all orders
    public function index(Request $request){
        $orders = Order::with('user')->orderBy('created_at', 'desc')->get();
        return response()->json([
            'success' => true,
            'data' => $orders,
        ]);
    }
    
    // for web view
    public function webIndex()
    {
        $orders = Order::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin_orders', compact('orders'));
    }

    // to find a specific order by id
    public function show($id){
        $order = Order::with(['user', 'items.product'])->find($id);
        if(! $order){
            return response()->json(['message' => 'Order not found'], 404);
        }
        return response()->json([
            'success' => true,
            'data' => $order,
        ]);
    }

    // update status of an order
    public function updateStatus(Request $request, $id){
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled',
        ]);

        $order = Order::find($id);
        if(! $order){
            return response()->json(['message' => 'Order not found'], 404);
        }

        $order->status = $request->status;
        $order->save();

        return response()->json([
            'success' => true,
            'message' => 'Order status updated',
            'data' => $order,
        ]);
    }
}