<?php

namespace App\Http\Controllers\Api;

use App\Models\Draw;
use App\Models\DrawUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DrawController extends Controller
{
    public function index()
    {
        $model = Draw::query()
            ->with('image', 'galleries.image', 'DrawUserWinner', 'drawUsers.user')
            ->withCount('drawUsers')
            ->get();

        return response()->success($model);
    }

    public function show($id)
    {
        $model = Draw::query()
            ->with('galleries.image', 'DrawUserWinner', 'drawUsers', 'image')
            ->find($id);

        if(!$model) {
            return response()->error('draw.not-found');
        }

        return response()->success($model);
    }

    public function joinDraw(Request $request, $drawId)
    {
        $user = $request->user('api');
        $draw = Draw::query()->find($drawId);
        if(!$draw) {
            return response()->error('draw.not-found');
        }

        $isJoined = DrawUser::query()
            ->where('user_id', $user->id)
            ->where('draw_id', $drawId)
            ->first();


        if($isJoined) {
            return response()->error('draw.multiple-join');
        }

        $model = new DrawUser();
        $model->draw()->associate($draw);
        $model->user()->associate($user);
        $model->is_joined = true;
        $model->save();

        return response()->success($model);
    }

    public function disJoinDraw(Request $request, $drawId)
    {
        $user = $request->user('api');
        $draw = Draw::query()->find($drawId);
        if(!$draw) {
            return response()->error('draw.not-found');
        }

        $model = DrawUser::query()
            ->whereIn('user_id', [$user->id, $draw->id])
            ->whereIn('draw_id', [$draw->id, $user->id])
            ->first();

        $model->delete();
    }

    public function users($id)
    {
        $model = DrawUser::query()
            ->with('user.image')
            ->where('draw_id', $id)->get();

        return response()->success($model);
    }

    public function userCount($id)
    {
        $model = DrawUser::query()->where('draw_id', $id)->get();

        $count = $model->count();

        return response()->success($count);
    }


}
