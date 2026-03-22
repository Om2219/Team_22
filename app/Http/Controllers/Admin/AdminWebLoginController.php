<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminWebLoginController extends Controller {

    // Shows the login
    public function showLoginForm(){
        return view('admin');
    }

    // Handling login (admins)
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Check if the user is banned
            if(!$user->is_active){
                Auth::logout();
                return back()->withErrors([
                    'email' => 'This account has been banned. Please contact customer support.',
                ]);
            }

            // Check if the user is an admin
            if ($user->role === 'admin') {
                // check if its the first login
                if ($user->change_password) { // if true they need to change it
                    return redirect()->route('admin.firstLogin');
                }
                return redirect()->route('admin.dashboard');
            }
            // Show error if they don't have admin access
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