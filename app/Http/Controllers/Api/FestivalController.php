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
        $category   = $request->input('category_id') ?? false;
        $isAbroad     = $request->input('is_abroad') ?? null;
        $isLocation = $request->input('is_location') ?? null;

        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $location = $latitude && $longitude ? "{$latitude},{$longitude}" : null;

        if($isLocation == null) {
            $location = null;
        }

        $query = Festival::query()
            ->with('image', 'address.city', 'address.county', 'category.image', 'galleries.image')
            ->withCount('likes', 'comments')
            ->where('title', 'LIKE',  "%{$title}%")
            ->orderBy('rate', 'desc');

        switch ($sort) {
            case 'title':
                $query->orderBy('title', 'asc');
                break;
        }

        if($category) {
            $query->orderBy($category, 'asc');
        }

        if($isAbroad) {
            $query->orderBy($isAbroad, 'asc');
        }

        $query->distance($location);

        $model = $query;
        $model->get()->sortBy('is_liked');

        return response()->paginate($model);
    }

    /**
     * @param Request $request
     * @return mixed
     *
     */
    public function like(Request $request)
    {
        $user = $request->user('api');
        $festivalId = $request->input('festival_id');
        $festival = Festival::query()->with('galleries')->find($festivalId);
        if(!$festival) {
            return response()->error('festival.not-found');
        }

        $festivalLike = Like::query()
            ->with('festival', 'user.image')
            ->where('user_id', $user->id)
            ->where('festival_id', $festivalId)
            ->first();


        if(!$festivalLike) {
            $festivalLike = new Like();
            $festivalLike->is_liked = true;
            $festivalLike->user()->associate($user);
            $festivalLike->festival()->associate($festival);
            $festivalLike->save();

        }

        if($festivalLike->is_liked == false) {
            $festivalLike->is_liked = true;
            $festivalLike->save();
        }

        return response()->success($festivalLike);
    }

    public function disLike(Request $request)
    {
        $user = $request->user('api')
            ->load('image');
        $festivalId = $request->input('festival_id');
        $festival = Festival::query()->with('galleries')->find($festivalId);
        if(!$festival) {
            return response()->error('festival.not-found');
        }

        $festivalLike = Like::query()
            ->with('festival', 'user.image')
            ->where('user_id', $user->id)
            ->where('festival_id', $festivalId)
            ->first();


        if(!$festivalLike) {
            return response()->error('festival.not-found');
        }

        if($festivalLike->is_liked = true) {
            $festivalLike->delete();
        }

        return response()->success($festival);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function comment(Request $request)
    {
        $festivalId = $request->input('festival_id');
        $festival = Festival::query()->with('galleries')->find($festivalId);
        if(!$festival) {
            return response()->error('festival.not-found');
        }

        $user = $request->user('api')
            ->load('image');

        $comment = new Comment([
            'comment'     => $request->input('comment')
        ]);

        $comment->user()->associate($user);
        $comment->festival()->associate($festival);
        $comment->save();

        $model = Comment::query()->with('user.image')->find($comment->id);
        if(!$model) {
            return response()->error('comment.not-found');
        }

        return response()->success($model);
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
        $model = Festival::query()->with('comments.user.image')->find($id);
        if(!$model) {
            return response()->error('festival.not-found');
        }

        return response()->success($model);
    }

}
