<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ReportController extends Controller {

    // Report page with different stats
    public function index() {
        // Row 1 - overall stats
        $totalOrders = Order::count();
        $totalEarnings = Order::sum('total');
        $totalCustomers = User::where('role', 'customer')->count();

        // Row 2 - stats for today
        $todayOrders = Order::whereDate('created_at', today())->count();
        $todayEarnings = Order::whereDate('created_at', today())->sum('total');
        $todayTopProduct = Product::withCount('orderItems')->orderBy('order_items_count', 'desc')->first();

        // Row 3 - stats for the month
        $monthlyOrders = Order::whereMonth('created_at', now()->month)->count();
        $monthlyEarnings = Order::whereMonth('created_at', now()->month)->sum('total');
        $pendingOrders = Order::where('status', 'pending')->count();

        // top 5 products
        $topProducts = Product::withCount('orderItems')
            ->orderBy('order_items_count', 'desc')
            ->take(5)
            ->get();

        return view('admin_reports', compact(
            'totalOrders',
            'totalEarnings',
            'totalCustomers',
            'todayOrders',
            'todayEarnings',
            'todayTopProduct',
            'monthlyOrders',
            'monthlyEarnings',
            'pendingOrders',
            'topProducts'
        ));
    }
}