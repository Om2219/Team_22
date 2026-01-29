<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    // Handles admin login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Authenticate and error message
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid email or password'], 401);
        }
        
        $user = Auth::user();

        // Check if user is admin
        if ($user->role !== 'admin') {
            Auth::logout();
            return response()->json(['message' => 'Admin access required'], 403);
        }
        // Need to generate token for admin user so that they can access admin portal
        $token = $user->createToken('admin-token')->plainTextToken;

        // Return user details and token
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
}