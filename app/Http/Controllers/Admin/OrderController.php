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
    public function webIndex(Request $request) {
        $query = Order::with('user');

        // can search by id or cusotmer name
        if ($request->search) {
            $query->where('id', 'like', '%' . $request->search . '%')
                ->orWhereHas('user', function($q) use ($request) {
                    $q->where('forename', 'like', '%' . $request->search . '%')
                    ->orWhere('surname',  'like', '%' . $request->search . '%');
                });
        }

        // filter by staus (processing, shipping, cancelled, pending, delivered)
        if ($request->status && $request->status != 'all') {
            $query->where('status', $request->status);
        }

        // filter by date
        if ($request->date_to) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }
        if ($request->date_from) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        // sort
        $sort = $request->get('sort');
        if ($sort == 'oldest') {
            $query->orderBy('created_at', 'asc');
        } elseif ($sort == 'newest') {
            $query->orderBy('created_at', 'desc');
        } else {
            $query->orderBy('id', 'desc');
        }

        // 20 orders per page
        $orders = $query->paginate(20)->withQueryString();
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
            'status' => 'required|in:Pending,Processing,Shipped,Delivered,Cancelled,Pending Refund,Refunded',
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
            'status' => 'required|in:Pending,Processing,Shipped,Delivered,Cancelled,Pending Refund,Refunded',
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