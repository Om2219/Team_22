<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller {

    // Admin login
    public function login(Request $request) {
        // Need email and password
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Checking if they are logging in correctly
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid email or password'], 401);
        }
        
        // Have to get the user
        $user = Auth::user();

        // Check if the user is an admin - with error message if not
        if ($user->role !== 'admin') {
            Auth::logout();
            return response()->json(['message' => 'Admin access required'], 403);
        }
        // Need a token for admin user
        $token = $user->createToken('admin-token')->plainTextToken;

        // User details (for later admin use)
        return response()->json([
            'message' => 'Login successful',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
            ],
            'token' => $token
        ]);
    }

    // Admin logout - success message
    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }
}