<?php

namespace App\Http\Controllers\Api;

use App\Models\Wanted;
use App\Models\Image;
use Exception;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class WantedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $user = $request->user()
            ->load('image');

        $model = $user->wanteds()->get();

        return response()->success($model);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $images = $request->hasFile('images');
        if(!$images){
            return response()->error('user.wanted.image');
        }
        /** @var User $request */
        $user = $request->user();


        $model = new Wanted($request->input());
        $model->user()->associate($user);
        $model->save();

        $images = $request->file('images');
        foreach ($images as $key => $image){
            $model->image()->save(new Image([
                'key'   => $key,
                'image' => $image,
            ]));
        }


        return response()->success($model);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $model = Wanted::query()->with('image', 'category')->find($id);
        if(!$model) {
            return response()->error('wanted.not-found');
        }

        return response()->success($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $user = $request->user();

        $model = Wanted::query()->find($id);
        if(!$model) {
            return response()->error('auth.not-found');
        }

        $model->fill($request->input());
        $model->user()->associate($user);
        $model->save();

        $images = $request->file('images');
        foreach ($images as $key => $image){
            $model->image()->where('key', $key)->delete();
            $model->image()->save(new Image([
                'key'   => $key,
                'image' => $image,
            ]));
        }

        return response()->success($model);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     * @throws Exception
     */
    public function destroy($id)
    {
        $model = Wanted::query()->find($id);
        if(!$model) {
            return response()->error('wanted.not-found');
        }

        $model->delete();

        return response()->message('wanted.store.sucess');
    }
}
