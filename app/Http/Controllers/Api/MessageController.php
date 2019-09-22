<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
//        $user = $request->user('api')
//            ->load('image', 'conversations', 'messages');
//
//        $user['messages'] = $user->messages()->orderBy('created_at', 'desc')->get();

        $user = $request->user('api')
            ->load('image', 'conversations');

        $model = $user->conversations()->with('user_one.image', 'user_two.image')->get();

        return response()->success($model);
    }

    public function sendMessage(Request $request)
    {
        $user = $request->user('api');
        $user_two = $request->input('user_two');

        if($user_two== $user->id) {
            return response()->error('message.self');
        }

        // Get conversation data
        $conversation = Conversation::whereIn('user_one_id', [$user->id, $user_two])
            ->whereIn('user_two_id', [$user_two, $user->id])
            ->first();

        if ($conversation == NULL)
        {
            $newConversation = Conversation::create([
                'user_one'      => $user,
                'user_two'      => $user_two
            ]);
        }

        // Create message
        $model = Message::create([
            'message'           => $request->input('message'),
            'user_one_id'       => $user->id,
            'user_two_id'       => $user_two,
            'conversation_id'   => $conversation !== NULL ? $conversation->id : $newConversation->id,
            'date'              => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        return response()->success($model);
    }
}
