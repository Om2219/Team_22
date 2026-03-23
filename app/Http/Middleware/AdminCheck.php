<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminCheck {

    public function handle(Request $request, Closure $next) {
        // Redirect to login if not authenticated
        if (!auth()->check()) {
            return redirect('/login');
        }
        // Redirecting to home if there's an error
        if (auth()->user()->role !== 'admin') {
            return redirect('/home')->with('error', 'Admin access failed.');
        }
        // Takes you to admin if u pass the checks
        return $next($request);
    }
}