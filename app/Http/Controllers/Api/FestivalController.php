<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use App\Models\Festival;
use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FestivalController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        $model = Festival::query()->with('image', 'likes', 'comments')->get();

        return response()->success($model);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function like(Request $request)
    {
        $festival = Festival::query()->find($request->input('festival_id'));
        if(!$festival) {
            return response()->error('festival.not-found');
        }

        $user = $request->user('api');

        $like = new Like([
            'like'      => true,
        ]);

        $like->user()->associate($user);
        $like->festival()->associate($festival);
        $like->save();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function comment(Request $request)
    {
        $festival = Festival::query()->find($request->input('festival_id'));
        if(!$festival) {
            return response()->error('festival.not-found');
        }

        $user = $request->user('api');

        $comment = new Comment([
            'comment'     => $request->input('comment')
        ]);

        $comment->user()->associate($user);
        $comment->festival()->associate($festival);
        $comment->save();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function likeCount(Request $request)
    {
        $festival = Festival::query()->find($request->input('festival_id'));
        if(!$festival) {
            return response()->error('festival.not-found');
        }

        $count = Festival::join('likes', 'likes.festival_id', '=', 'festivals.id')
            ->groupBy('festivals.id')
            ->get(['festivals.id', DB::raw('count(likes.id) as likes')]);


        return response()->success($count);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function commentCount(Request $request)
    {
        $festival = Festival::query()->find($request->input('festival_id'));
        if(!$festival) {
            return response()->error('festival.not-found');
        }

        $count = Festival::join('comments', 'comments.festival_id', '=', 'festivals.id')
            ->groupBy('festivals.id')
            ->get(['festivals.id', DB::raw('count(comments.id) as comments')]);

        return response()->success($count);
    }

}
