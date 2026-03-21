<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;

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

    //takes the user's phone number and only displays the first number (7 in UK) and last 2 digits for privacy reasons
    //only does so if there is a phone number set (as users don't do this by default when signing up)
    //protected so something else can't call it by accident

    protected function censorPhone($phone) {
        if (!$phone) {
            return null;
        }

        $phone = str_replace(' ', '', $phone);

        if (strlen($phone) < 13) {
            return $phone;
        }

        $country = substr($phone, 0, 3);      // UK only (i cba to do ROI)
        $firstDigit = substr($phone, 3, 1);
        $middle = substr($phone, 4, -2);
        $lastTwo = substr($phone, -2);
        $maskedMiddle = str_repeat('*', strlen($middle));
        return $country.' '.$firstDigit.substr($maskedMiddle, 0, 3).' '.substr($maskedMiddle, 3).$lastTwo;
    }

    //returns the censored email and censored phone number for use on the details page

    public function show() {
        $user = Auth::user();

        $censoredemail = $this->censor($user->email);
        $censoredphone = $this->censorPhone($user->phone_number);

        return view('mydetails', compact('censoredemail', 'censoredphone'));
    }

    //shows change email page

    public function show_changeEmail() {
        return view('changeEmail');
    }

    //updates user's email with new one
    //only if current email field matches email in table
    //and if the new email is inputted twice correctly
    //checks if email has been taken by someone else
    //or if new email is same as current one

    public function update_email(Request $request) {
        $user = Auth::user();

        $request->validate([
            'current_email' => 'required|email',
            'new_email' => ['required','email', Rule::unique('users', 'email')->ignore($user->id),],                                                     
            'new_email_confirmation' => 'required|email',
        ]);

        if ($request->current_email !== $user->email) {
            return redirect()->back()->withErrors(['current_email' => 'Current email does not match our records.',]);
        }

        if ($request->new_email === $user->email) {
            return redirect()->back()->withErrors(['new_email' => 'New email must be different from your current email.',]);
        }

        if ($request->new_email !== $request->new_email_confirmation) {
            return redirect()->back()->withErrors(['new_email_confirmation' => 'New email and confirmation do not match.',]);
        }

        $user->email = $request->new_email;
        $user->save();

        return redirect()->route('mydetails')->with('success', 'Email updated successfully');
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
            'new_password' => ['required',Password::min(6)->mixedCase()->numbers()->symbols(),],
            'new_password_confirmation' => ['required',Password::min(6)->mixedCase()->numbers()->symbols(),],
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.',]);
        }

        if (Hash::check($request->new_password, $user->password)){
            return redirect()->back()->withErrors(['new_password' => 'New password must be different from your current password.',]);
        }

        if ($request->new_password !== $request->new_password_confirmation) {
            return redirect()->back()->withErrors(['new_password_confirmation' => 'New password and confirmation do not match.',]);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();
        
        return redirect()->route('mydetails')->with('success', 'Password updated successfully');
    }

    //shows change name page

    public function show_changeName() {
        return view('changeName');
    }

    //updates user's first and last name as well as title
    //little to no validation because the user may not want to change any of their details if they go on the page
    //or may not want to change all details, only one or two fields
    //only validates that the format is right
    //or that the selector is one of the options

    public function update_name(Request $request) {
        $user = Auth::user();

        $request->validate([
            'title' => 'nullable|in:Mr.,Ms.,Mrs.,Miss.,Mx.',
            'forename' => 'nullable|string',
            'surname' => 'nullable|string',
        ]);

        $updated = false;

        if ($request->filled('title')) {
            $user->title = $request->title;
            $updated = true;
        }

        if ($request->filled('forename')) {
            $user->forename = $request->forename;
            $updated = true;
        }

        if ($request->filled('surname')) {
            $user->surname = $request->surname;
            $updated = true;
        }

        if ($updated) {
            $user->save();
            return redirect()->route('mydetails')->with('success', 'Details updated successfully.');
        }

        return redirect()->route('mydetails')->with('success', 'No changes were made.');
    }

    //shows change phone number page

    public function show_changePhone() {
        $user = Auth::user();
        
        return view('changePhone');
    }

    //updates the user's phone number in the database
    //checks if number is from UK (+44 7xxx xxxxxx)
    //checks if confirmation is correct

    public function update_phone(Request $request) {
        $user = Auth::user();

        $request->validate([
            'new_phone' => ['required'],
            'new_phone_confirmation' => ['required', 'same:new_phone'],
        ]);

        if (!preg_match('/^\+44 7\d{3} \d{6}$/', $request->new_phone)) {
            return redirect()->back()->withErrors(['new_phone' => 'New phone number is not a UK phone number (+44 7xxx xxxxxx)',]);
        }

        if ($request->new_phone !== $request->new_phone_confirmation) {
            return redirect()->back()->withErrors(['new_phone_confirmation' => 'New phone number and confirmation do not match.',]);
        }

        $user->phone_number = $request->input('new_phone');
        $user->save();

        return redirect()->route('mydetails')->with('success', 'Phone number updated successfully');
    }

    //allows user to upload a profile picture image
    //sets the file name to user id, and a timestamp of when it was uploaded
    //sets the path in the database

    public function uploadPFP(Request $request) {
        $user = Auth::user();

        $request->validate([
            'profile_picture' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {

            $file = $request->file('profile_picture');
            $extension = $file->getClientOriginalExtension();

            $filename = 'user_'.$user->id.'_'.now()->format('Ymd_His').'.'.$extension;

            if ($user->profile_picture_path) {
                $oldPath = public_path($user->profile_picture_path);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $file->move(public_path('profile_pictures'), $filename);

            $user->profile_picture_path = 'profile_pictures/' . $filename;
            $user->save();

            return back()->with('success', 'Profile picture updated.');
        }
    }

    //allows user to remove profile picture
    //removes image file from folder
    //removes path in database

    public function removePFP() {
        $user = Auth::user();

        if ($user->profile_picture_path) {
            $oldPath = public_path($user->profile_picture_path);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }

            $user->profile_picture_path = null;
            $user->save();
        }

        return back()->with('success', 'Profile picture removed.');
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
