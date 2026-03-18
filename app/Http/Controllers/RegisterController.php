<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller {
    
    public function create() {
        return view('register');
    }
    
    public function store(Request $request) {
        $request->validate([ 
            'title' => 'required',
            'forename' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users,email', 
            'password' => ['required', 'confirmed', Password::min(6) -> mixedCase()->numbers()->symbols()],
        ]);
        User::create([
            'title' => $request->title,
            'forename' => $request->forename,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/login')->with('success', 'Account created successfuly.');
    }
}

