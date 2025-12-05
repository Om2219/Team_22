<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back();
        } else {
            $user->password = Hash::make($request->new_password);
            $user->save();
        }
        return redirect()->route('mydetails');
    }
}
