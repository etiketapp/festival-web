<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
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
        $user_two = User::query()->find($request->input('user_two'));


        if($user_two->id == $user->id) {
            return response()->error('message.self');
        }

        // Get conversation data
        $conversation = Conversation::whereIn('user_one_id', [$user->id, $user_two->id])
            ->whereIn('user_two_id', [$user_two->id, $user->id])
            ->first();

        if ($conversation == NULL)
        {
            $newConversation = Conversation::create([
                'user_one_id'      => $user->id,
                'user_two_id'      => $user_two->id
            ]);
        }

        // Create message
        $model = Message::create([
            'message'           => $request->input('message'),
            'user_one_id'       => $user->id,
            'user_two_id'       => $user_two->id,
            'conversation_id'   => $conversation != NULL ? $conversation->id : $newConversation->id,
            'is_readed'         => 0,
            'date'              => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $model->conversation->save();

        $model = Message::query()->find($model->id);

        return response()->success($model);
    }

    public function messageDetail(Request $request)
    {
        $user = $request->user('api');
        if(!$user) {
            return response()->error('auth.not-found');
        }

        $userTwo = User::query()->find($request->input('user_two_id'));

        $conversation = Conversation::query()
            ->with('messages')
            ->where('user_two_id', $userTwo->id)
            ->where('user_one_id', $user->id)
            ->first();

        if(!$conversation) {
            $conversation = Conversation::create([
                'user_one_id'      => $user->id,
                'user_two_id'      => $userTwo->id
            ]);
        }

        if($user->id == $userTwo->id)
        {
            $conversation->is_seen = true;
        }
        else
        {
            $conversation->is_seen = false;
        }

        $conversation->unread_messages = 0;
        $conversation->save();

        return response()->success($conversation->messages);
    }
}
