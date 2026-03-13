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

        // check if the user is banned
        if(!$user->is_active){
            return back()->withErrors(['email' => 'This account has been banned. Please contact customer support.']);
        }

        if($user->role == 'admin'){
            return back()->withErrors([
                'email' => 'Admin users please login via the admin login.',
            ]);
        }

        Auth::login($user);
        return redirect('/account');
    }
    
    public function logout(){
        Auth::logout();
        return redirect('/home');
    }
}
