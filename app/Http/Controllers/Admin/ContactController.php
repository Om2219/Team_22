<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // show all of the messages
    public function index()
    {
        $messages = ContactForm::orderBy('created_at', 'desc')->get();
        return view('admin_contacts', compact('messages'));
    }

    // view a single message
    public function show($id)
    {
        $message = ContactForm::find($id);
        
        if (!$message) {
            return redirect()->route('admin.contactforms')->with('error', 'Message not found');
        }

        if (!$message->is_read) {
            $message->is_read = true;
            $message->save();
        }

        return view('admin_contact_show', compact('message'));
    }

    // reply to a message
    public function reply(Request $request, $id) {
        $request->validate([
            'reply' => 'required|string',
        ]);
        $message = ContactForm::find($id);
        if (!$message) {
            return redirect()->route('admin.contactforms')->with('error', 'Message not found');
        }
        // send email to user
        $message->reply = $request->reply;
        $message->is_replied = now();
        $message->save();
        return redirect()->route('admin.contactforms.show', $id)->with('success', 'Reply sent');
    }

    // delete a message
    public function destroy($id)
    {
        $message = ContactForm::find($id);
        
        if (!$message) {
            return redirect()->route('admin.contactforms')->with('error', 'Message not found');
        }

        $message->delete();
        return redirect()->route('admin.contactforms')->with('success', 'Message deleted');
    }
}