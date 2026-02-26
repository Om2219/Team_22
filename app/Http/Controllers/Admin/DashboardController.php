<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function index() {
        // need total users, orders, products
        $totalUsers = User::count();
        $totalOrders = Order::count();
        $totalProducts = Product::count();
        
        $recentOrders = Order::with('user')->orderBy('created_at', 'desc')->limit(7)->get();

        return view('admin_dashboard', compact('totalUsers', 'totalOrders', 'totalProducts', 'recentOrders'));
    }
}