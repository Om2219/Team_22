<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactFormController extends Controller {
    // Handles contact form submission
    // Returns to the contact page with a success message
    public function submit(Request $request) {
        $request->validate([
            // Below are the fields that need to be filled in the contact form
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string'
        ]);
        // success message
        return redirect('/contact')->with('success', 'Thank you for reaching out. Your message is with our team and you will recieve a response shortly.');
    }
}

// ready for front-end integration