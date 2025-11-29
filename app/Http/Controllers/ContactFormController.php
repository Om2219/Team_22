<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactFormController extends Controller {
    public function submit(Request $request) {
        $request->validate([ 'name' => 'required',
        'email' => 'required', ]);

        return redirect('/contact')->with('success', 'done - worked');
    }
}