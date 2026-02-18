<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class ChatBotController extends Controller
{

public function sendChat(Request $request)
{
    $response = OpenAI::chat()->create([
        'model' => 'gpt-4.1-mini',
        'messages' => [  
            ['role' => 'user', 'content' => $request->input('input'), ],
        ],
        'max_tokens' => 100,
    ]);

    return $response->choices[0]->message->content;
}
}
