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
        $model = Draw::query()->with('image', 'galleries.image')->get();

        return response()->success($model);
    }

    public function joinDraw(Request $request, $drawId)
    {
        $user = $request->user('api');
        $draw = Draw::query()->find($drawId);
        if(!$draw) {
            return response()->error('draw.not-found');
        }

        $model = new DrawUser();
        $model->user()->associate($user);
        $model->draw()->associate($draw);
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
        $model = DrawUser::query()->where('draw_id', $id)->get();

        return response()->success($model);
    }

    public function userCount($id)
    {
        $model = DrawUser::query()->where('draw_id', $id)->get();

        $count = $model->count();

        return response()->success($count);
    }


}
