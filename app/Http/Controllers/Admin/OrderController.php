<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller {

    // Get all orders
    public function index(Request $request){
        $orders = Order::with('user')->orderBy('created_at', 'desc')->get();
        return response()->json($orders);
    }
    
    // Web view
    public function webIndex() {
        $orders = Order::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin_orders', compact('orders'));
    }

    // Find orders by id
    public function show($id) {
        $order = Order::with(['user', 'items.product'])->find($id);

        if(!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        return response()->json($order);
    }

    // Update status of an order
    public function updateStatus(Request $request, $id) {
        $request->validate([
            'status' => 'required|in:Pending,Processing,Shipped,Delivered,Cancelled',
        ]);

        $order = Order::find($id);

        if(!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $order->status = $request->status;
        $order->save();
        return response()->json(['message' => 'Order status updated']);
    }

    // Update status (web view)
    public function webUpdateStatus(Request $request, $id) {
        $request->validate([
            'status' => 'required|in:Pending,Processing,Shipped,Delivered,Cancelled',
        ]);

        $order = Order::find($id);

        if(!$order) {
            return redirect()->back()->with('error', 'Order not found');
        }

        $order->status = $request->status;
        $order->save();
        return redirect()->back()->with('success', 'Order status updated');
    }
}