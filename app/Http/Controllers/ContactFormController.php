<?php

namespace App\Http\Controllers;
use App\Models\ContactForm;

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
        // Stores the contact form data
        ContactForm::create($request->all());

        // redirects to a thank you page after submission
        return view('contactformredirect');
    }
}

// ready for front-end integration