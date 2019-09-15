<?php

use Illuminate\Http\Request;

// Auth
Route::get('auth', ['as' => 'auth.index', 'uses' => 'AuthController@index']);
Route::post('auth/register', ['as' => 'auth.register', 'uses' => 'AuthController@register']);
Route::post('auth/social/{provider}', ['as' => 'auth.social', 'uses' => 'AuthController@social']);
Route::post('auth/login', ['as' => 'auth.login', 'uses' => 'AuthController@login']);
Route::post('auth/logout', ['as' => 'auth.logout', 'uses' => 'AuthController@logout']);
Route::post('auth/forgot', ['as' => 'auth.forgot', 'uses' => 'AuthController@forgot']);

Route::get('contract', ['as' => 'contract.index', 'uses' => 'ContractController@index']);
Route::get('contract/{id}', ['as' => 'contract.{id}', 'uses' => 'ContractController@show']);


Route::group(['middleware' => 'auth:api'], function () {
    // User
    Route::get('user/{user}/festivals', ['as' => 'user.user.festivals', 'uses' => 'UserController@festivals']);
    Route::put('user/{user}/password', ['as' => 'user.password', 'uses' => 'UserController@password']);
    Route::resource('user', 'UserController', ['only' => ['show', 'update']]);

    // Categories
    Route::get('category', ['as' => 'category.index', 'uses' => 'CategoryController@index']);

    // Festival
    Route::get('festival', ['as' => 'festival.index', 'uses' => 'FestivalController@index']);
    Route::get('festival/like', ['as' => 'festival.like', 'uses' => 'FestivalController@like']);
    Route::get('festival/like/count', ['as' => 'festival.like.count', 'uses' => 'FestivalController@likeCount']);
    Route::get('festival/comment', ['as' => 'festival.comment', 'uses' => 'FestivalController@comment']);
    Route::get('festival/comment/count', ['as' => 'festival.comment.count', 'uses' => 'FestivalController@commentCount']);
    Route::get('festival/{festival}/likeUsers', ['as' => 'festival.likeUsers', 'uses' => 'FestivalController@likeUsers']);
    Route::get('festival/{festival}/commentUsers', ['as' => 'festival.commentUsers', 'uses' => 'FestivalController@commentUsers']);

    // Message
    Route::get('message/', ['as' => 'message.index', 'uses' => 'MessageController@index']);
    Route::get('message/send', ['as' => 'message.send', 'uses' => 'MessageController@sendMessage']);

    // Draw
    Route::get('draws', ['as' => 'draws.index', 'uses' => 'DrawController@index']);
    Route::get('draw/{drawId}/join', ['as' => 'draw.{drawId}.join', 'uses' => 'DrawController@joinDraw']);
    Route::get('draw/{drawId}/disjoin', ['as' => 'draw.{drawId}.disjoin', 'uses' => 'DrawController@disJoinDraw']);
    Route::get('draw/{drawId}/users', ['as' => 'draw.{drawId}.users', 'uses' => 'DrawController@users']);
    Route::get('draw/{drawId}/count', ['as' => 'draw.{drawId}.count', 'uses' => 'DrawController@userCount']);
});