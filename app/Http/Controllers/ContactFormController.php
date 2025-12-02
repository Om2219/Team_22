<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactFormController extends Controller {
    public function submit(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string'
        ]);

        return redirect('/contact')->with('success', 'Thank you for reaching out. Your message is with our team and you will recieve a response shortly.');
    }
}