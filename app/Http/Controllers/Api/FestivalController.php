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
    public function index(Request $request)
    {
        $user = $request->user('api');

        $title      = $request->input('title') ?? '';
        $sort       = $request->input('sort') ?? null;
        $category   = $request->input('category') ?? null;

        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $location = $latitude && $longitude ? "{$latitude},{$longitude}" : null;

        $query = Festival::query()
            ->with('image', 'address.city', 'address.county', 'category', 'galleries.image')
            ->withCount('likes', 'comments')
            ->where('title', 'LIKE',  "%{$title}%");

        switch ($sort) {
            case 'title':
                $query->orderBy('title', 'asc');
                break;
        }

        if($category) {
            $query->orderBy($category, 'asc');
        }

        $query->distance($location);

        $model = $query;

        return response()->paginate($model);
    }

    /**
     * @param Request $request
     * @return mixed
     *
     */
    public function like(Request $request)
    {
        $festivalId = $request->input('festival_id');
        $festival = Festival::query()->find($festivalId);
        if(!$festival) {
            return response()->error('festival.not-found');
        }

        $user = $request->user('api');

        $like = $user->festivals()
            ->where('id', $festival->id)
            ->first();

        if($like == true) {
            $like = false;
        } else {
            $like = true;
        }

        $like = new Like([
            'like'      => true,
        ]);

        $like->user()->associate($user);
        $like->festival()->associate($festival);
        $like->save();

        return response()->success($like);
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

    /**
     * @param Request $request
     * @param $id
     * @return
     */
    public function likeUsers(Request $request, $id)
    {
        $model = Festival::query()->with('likes.user.image')->find($id);
        if(!$model) {
            return response()->error('festival.not-found');
        }

        return response()->success($model);
    }

    /**
     * @param Request $request
     * @param $id
     * @return
     */
    public function commentUsers(Request $request, $id)
    {
        $model = Festival::query()->with('comments.user')->find($id);
        if(!$model) {
            return response()->error('festival.not-found');
        }

        return response()->success($model);
    }

}
