<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminWebLoginController extends Controller
{
    public function showLoginForm(){
        return view('admin');
    }

    // handling login form for admins
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            // check if user is admin
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            // if not admin show error
            Auth::logout();
            return back()->withErrors([
                'email' => 'Admin access only. Please use an admin account.',
            ]);
        }

        return back()->withErrors([
            'email' => 'Invalid login details.',
        ]);
    }
}