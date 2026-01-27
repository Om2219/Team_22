<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function create(){
        return view('login');
    }
    public function store(Request $request){
        $request->validate([ 'email' => 'required|email', 'password' => 'required']);
        $user = User::where('email', $request->email)->first();
        if(! $user || ! Hash::check($request->password, $user->password)){
            return back()->withErrors(['email' => 'Invalid login details.']);
        }
        Auth::login($user);
        return redirect('/account');
    }
    public function logout(){
        Auth::logout();
        return redirect('/home');
    }
}
