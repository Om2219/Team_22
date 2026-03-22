<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller {

    public function create(){
        return view('login');
    }
    public function store(Request $request){
        $request->validate([ 'email' => 'required|email', 'password' => 'required']);
        $user = User::where('email', $request->email)->first();
        if(! $user || ! Hash::check($request->password, $user->password)){
            return back()->withErrors(['email' => 'Invalid login details.']);
        }

        // Check if the user is banned
        if(!$user->is_active){
            return back()->withErrors(['email' => 'This account has been banned. Please contact customer support.']);
        }

        // needed to temporarily change admin roles to customers so that they can see the user version of the website (changed back in logout)
        if ($user->role === 'admin') {
            session(['original_role' => 'admin']);
            $user->role = 'customer';
            $user->save();
        }

        Auth::login($user);
        return redirect('/account');
    }
    
    public function logout(){
        $user = Auth::user();

        // if it was an admin logging in as a user, make them an admin again
        if (session('original_role') === 'admin') {
            $user->role = 'admin';
            $user->save();
            session()->forget('original_role');
        }

        Auth::logout();
        return redirect('/home');
    }
}
