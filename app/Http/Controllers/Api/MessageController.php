<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index($id, Request $request)
    {
        $user_one = $request->user('api');
        $user_two = User::query()->find($id);
        if(!$user_two) {
            return response()->error('user.not-found');
        }

        $conversation = Conversation::query()->whereIn('user_one', [$user_one->id, $id])
            ->whereIn('user_two', [$id, $user_one->id])
            ->first();


        $messages = '';
        if($conversation) {
            $messages = Message::query()->where('conversation_id', $conversation->id)->get();
        }

        return response()->success($messages);
    }

    public function sendMessage($id, Request $request)
    {
        $user = $request->user('api');

        if($id == $user->id) {
            return response()->error('message.self');
        }

        // Get conversation data
        $conversation = Conversation::whereIn('user_one', [$user->id, $id])
            ->whereIn('user_two', [$id, $user->id])
            ->first();

        if ($conversation == NULL)
        {
            $newConversation = Conversation::create([
                'user_one' => $user->id,
                'user_two' => $id,
            ]);
        }

        // Create message
        $model = Message::create([
            'message'           => $request->input('message'),
            'user_id'           => $user->id,
            'conversation_id'   => $conversation !== NULL ? $conversation->id : $newConversation->id,
        ]);

        return response()->success($model);
    }
}
