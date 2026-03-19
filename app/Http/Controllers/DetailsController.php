<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class DetailsController extends Controller {

    //takes the user's email and only displays the first character for privacy reasons
    //protected so something else can't call it by accident

    protected function censor($email) {
        $parts = explode('@', $email);
        $name = $parts[0];
        $domain = $parts[1];
        $censoredname = substr($name, 0, 1).str_repeat('*', max(strlen($name)-1, 0));
        $censoredemail = $censoredname . '@' . $domain; 
        return $censoredemail;
    }

    //returns the censored email for use on the details page

    public function show() {
        $user = Auth::user();
        $censoredemail = $this->censor($user->email);
        return view('mydetails', compact('censoredemail'));
    }

    //shows change email page

    public function show_changeEmail() {
        return view('changeEmail');
    }

    //updates user's email with new one
    //only if current email field matches email in table
    //and if the new email is inputted twice correctly

    public function update_email(Request $request) {
        $user = Auth::user();

        $request->validate([
            'current_email' => 'required|email',
            'new_email' => 'required|email|confirmed|unique:users,email',
        ]);

        $user->email = $request->new_email;
        $user->save();

        return redirect()->route('mydetails');
    }

    //shows change password page

    public function show_changePassword() {
        return view('changePassword');
    }

    //updates user's password with new one
    //only if current password field matches password in table
    //and if the new password is inputted twice correctly
    //password is then hashed and stored

    public function update_password(Request $request) {
        $user = Auth::user();

        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required','confirmed',Password::min(6)->mixedCase()->numbers()->symbols(),],
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect',]);
        }
        if (Hash::check($request->new_password, $user->password)){
            return redirect()->back()->withErrors(['new_password' => 'New password must be different from your current password',]);
        }
            $user->password = Hash::make($request->new_password);
            $user->save();
        return redirect()->route('mydetails')->with('success', 'Password updated successfully');
    }

    //shows forgot password page

    public function show_forgotPassword() {
        return view('forgotPassword');
    }

    //checks if email is present in database
    //checks if new password is valid (same validation as everywhere else)
    //checks if password is same as old one (by which point it would be useless to reset the password)
    //if everything checks out it changes the password in the user table

    public function update_forgotPassword(Request $request) {
        $request->validate([
            'email' => ['required','email'],
            'new_password' => ['required','confirmed', Password::min(6)->mixedCase()->numbers()->symbols()],
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'No account found with that email']);
        }

        if (Hash::check($request->new_password, $user->password)) {
            return redirect()->back()->withErrors(['new_password' => 'New password must be different from your current password']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('login')->with('success', 'Password reset successfully! You can now log in.');
    }
}
