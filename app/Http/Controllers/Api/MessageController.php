<?php

namespace App\Http\Controllers\Api;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $model = $user->received()->get();

        return response()->success($model);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $user = $request->user();
        $receiver = User::query()->find($id);
        if(!$receiver) {
            return response()->error('message.receiver.not-found');
        }

        $model = new Message($request->input());
        $model->sender()->associate($user);
        $model->receiver()->associate($receiver);
        $model->save();

        return response()->success($model);
    }

    public function update(Request $request, $id)
    {
        $user = $request->user();

        $model = Message::query()->find($id);
        if(!$model) {
            return response()->error('message.not-found');
        }

        $model->fill($request->input());
        $model->save();

        return response()->success($model);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Message::query()->find($id);
        if(!$model) {
            return response()->error('messages.not-found');
        }

        return response()->success($model);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $model = Message::query()->find($id);
        if(!$model) {
            return response()->error('messages.not-found');
        }

        $model->delete();
    }
}
