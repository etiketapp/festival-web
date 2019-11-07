<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\GsmRequest;
use App\Http\Requests\Api\PasswordRequest;
use App\Http\Requests\Api\UserRequest;
use App\Models\Comment;
use App\Models\Draw;
use App\Models\DrawUser;
use App\Models\Festival;
use App\Models\GsmVerify;
use App\Models\Like;
use App\Models\User;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        /** @var User $user */
        $user = $request->user();

        $user = $user->fresh('image');

        return response()->success($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        /** @var User $user */
        $user = $request->user();

        $user->fill($request->only(['full_name', 'email', 'birth_date', 'gender']));
        $user->save();

        if ($request->hasFile('image')) {
            $user->image()->delete();

            $user->image()->save(new Image([
                'image' => $request->file('image'),
            ]));
        }

        return response()->success($user->fresh('image'));

    }

    /**
     * @param PasswordRequest $request
     * @param $id
     * @return mixed
     */
    public function password(PasswordRequest $request, $id)
    {
        /** @var User $user */
        $user = $request->user();

        if (!\Hash::check($request->input('password'), $user->password)) {
            return response()->error('auth.password.invalid');
        }

        $user->password = $request->input('new_password');

        $user->save();

        return response()->message('auth.password');
    }

    public function likedFestivals(Request $request, $id)
    {
        $user = $request->user('api')
            ->load('image');
        if(!$user) {
            return response()->error('auth.not-found');
        }

        $collection = Like::query()
            ->with('festival.galleries.image', 'festival.category.image')
            ->where('user_id', $user->id)
            ->get();

        return response()->success($collection);
    }

    public function commentedFestivals(Request $request, $id)
    {
        $user = $request->user('api')
            ->load('image');

        if(!$user) {
            return response()->error('auth.not-found');
        }

        $collection = Comment::query()
            ->with('festival.galleries.image', 'festival.category.image')
            ->where('user_id', $user->id)
            ->get();

        return response()->success($collection);
    }

    public function userDraws(Request $request, $id)
    {
        $user = $request->user('api')
            ->load('image');
        if(!$user) {
            return response()->error('auth.not-found');
        }

        $collection = DrawUser::query()
            ->with('user', 'draw.galleries.image')
            ->where('user_id', $user->id)
            ->get();

        return response()->success($collection);
    }

    public function getUser($id)
    {
        $model = User::query()->with('image', 'likes.festival', 'comments.festival')->find($id);
        if(!$model) {
            return response()->error('user.not-found');
        }

        return response()->success($model);
    }

    public function getProfileDraws(Request $request)
    {
        $userId = $request->input('user_id');
        $user = User::query()->find($userId);
        if(!$user) {
            return response()->error('auth.not-found');
        }

        $model = DrawUser::query()
            ->with('user.image', 'draw.galleries.image')
            ->where('user_id', $userId)
            ->get();

        $model->sortByDesc('created_at');

        return response()->success($model);
    }

    public function notifications(Request $request, $id)
    {
        /** @var User $user */
        $user = $request->user();

        $notifications = $user->notifications()
            ->with('draw.galleries.image')->get();

        $response = response()->success($notifications);

        $user->notifications->markAsRead();

        return $response;
    }

    public function notificationCount(Request $request, $id)
    {
        /** @var User $user */
        $user = $request->user();

        $count = $user->unreadNotifications()->count();

        return response()->success($count);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getProfileLikes(Request $request)
    {
        $userId = $request->input('user_id');
        $user = User::query()->find($userId);
        if(!$user) {
            return response()->error('auth.not-found');
        }

        $model = Like::query()
            ->with('user.image', 'festival.galleries.image', 'festival.category')
            ->where('user_id', $userId)
            ->get();

        return response()->success($model);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getProfileComments(Request $request)
    {
        $userId = $request->input('user_id');
        $user = User::query()->find($userId);
        if(!$user) {
            return response()->error('auth.not-found');
        }

        $model = Comment::query()
            ->with('user.image', 'festival.galleries.image', 'festival.category')
            ->where('user_id', $userId)
            ->get();

        return response()->success($model);
    }

    public function unreadMessageCount(Request $request)
    {
        $user = $request->user('api')
            ->load('conversations');
        if(!$user) {
            return response()->error('auth.not-found');
        }

        $conversations = $user->conversations;

        $count['unread_message_count'] = 0;

        foreach ($conversations as $cv) {
            $count['unread_message_count'] += $cv->unread_message;
        }

        return response()->success($count);
    }

}
