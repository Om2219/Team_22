<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        // row 1 - overall stats
        $totalOrders = Order::count();
        $totalEarnings = Order::sum('total');
        $totalCustomers = User::where('role', 'customer')->count();

        // row 2 - stats for today
        $todayOrders = Order::whereDate('created_at', today())->count();
        $todayEarnings = Order::whereDate('created_at', today())->sum('total');
        $todayTopProduct = Product::withCount('order_items')->orderBy('order_items_count', 'desc')->first();

        // row 3 - stats for the current month
        $monthlyOrders = Order::whereMonth('created_at', now()->month)->count();
        $monthlyEarnings = Order::whereMonth('created_at', now()->month)->sum('total');
        $pendingOrders = Order::where('status', 'pending')->count();

        // top 5 products
        $topProducts = Product::withCount('order_items')
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