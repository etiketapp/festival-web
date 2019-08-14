<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user('api');

        $conversation = Conversation::query()->where('user_one', $user->id)->first();
        $message = Message::query()->where('conversation_id', $conversation->id)->get();

        return response()->success($message);
    }
}
