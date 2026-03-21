<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class FirstLoginController extends Controller {

    // lets admins see the form to reset their password
    public function show() {
        return view('firstLogin');
    }

    // Method to update the admin's password when first logging in
    public function updatePassword(Request $request) {

        // Checking the password meets the security requirements
        $request->validate([
            'new_password' => ['required', Password::min(6)->mixedCase()->numbers()->symbols()],
            'new_password_confirmation' => ['required', Password::min(6)->mixedCase()->numbers()->symbols()],
        ]);

        // Checking the password is the same as the confirmation
        if ($request->new_password !== $request->new_password_confirmation) {
            return back()->withErrors(['new_password_confirmation' => 'New password and confirmation do not match.']);
        }

        // Get the admin user and storing the new password
        $user = auth()->user();
        $user->password = Hash::make($request->new_password);
        // Have to set the change password to true so admins are only asked once for the password change
        $user->password_changed = true;
        $user->save();
        // Success + redirecting to admin dashboard
        return redirect()->route('admin.dashboard')->with('success', 'Password changed successfully!');
    }
}