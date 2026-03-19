<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactController extends Controller {

    // Show all of the messages
    public function index() {
        $messages = ContactForm::orderBy('created_at', 'desc')->get();
        return view('admin_contacts', compact('messages'));
    }

    // View the user message
    public function show($id) {
        return redirect()->route('admin.messages', ['id' => $id]);
    }

    // Reply to the message
    public function reply(Request $request, $id) {
        $request->validate([
            'reply' => 'required|string',
        ]);

        $message = ContactForm::find($id);
        if (!$message) {
            return redirect()->route('admin.contactforms')->with('error', 'Message not found');
        }

        // Save the reply - can add a feature to send an email/notification to the user
        $message->reply = $request->reply;
        $message->is_replied = now();
        $message->save();
        return redirect()->route('admin.messages.show', $id)->with('success', 'Reply sent');
    }

    // Delete the message
    public function destroy($id) {
        $message = ContactForm::find($id);
        
        if (!$message) {
            return redirect()->route('admin.contactforms')->with('error', 'Message not found');
        }

        $message->delete();
        return redirect()->route('admin.contactforms')->with('success', 'Message deleted');
    }

    // For the messages page
    public function messages(Request $request) {
        $messages = ContactForm::orderBy('created_at', 'desc')->get();
        $selectedMessage = null;
        if ($request->has('id')) {
            $selectedMessage = ContactForm::find($request->id);
            if ($selectedMessage && !$selectedMessage->is_read) {
                $selectedMessage->is_read = true;
                $selectedMessage->save();
            }
        }
        
        return view('admin_msg', compact('messages', 'selectedMessage'));
    }
}