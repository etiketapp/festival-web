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

// User Device
Route::resource('device', 'DeviceController');

//Version
Route::resource('version', 'VersionController', ['only' => ['index']]);

Route::group(['middleware' => 'auth:api'], function () {
    // User
    Route::get('user/{user}/likedFestivals', ['as' => 'user.liked.festivals', 'uses' => 'UserController@likedFestivals']);
    Route::get('user/{user}/commentedFestivals', ['as' => 'user.commented.festivals', 'uses' => 'UserController@commentedFestivals']);
    Route::get('user/{user}/userDraws', ['as' => 'user.draw.festivals', 'uses' => 'UserController@userDraws']);
    Route::get('user/{user}/getUser', ['as' => 'user.getUser', 'uses' => 'UserController@getUser']);
    Route::get('user/getProfileDraws', ['as' => 'user.getProfileDraws', 'uses' => 'UserController@getProfileDraws']);
    Route::get('user/getProfileLikes', ['as' => 'user.getProfileLikes', 'uses' => 'UserController@getProfileLikes']);
    Route::get('user/getProfileComments', ['as' => 'user.getProfileComments', 'uses' => 'UserController@getProfileComments']);
    Route::get('user/{user}/notification/count', ['as' => 'user.notification.count', 'uses' => 'UserController@notificationCount']);
    Route::get('user/{user}/notification', ['as' => 'user.notification.index', 'uses' => 'UserController@notifications']);
    Route::get('user/{user}/unreadcount', ['as' => 'user.unreadmessagecount', 'uses' => 'UserController@unreadMessageCount']);
    Route::put('user/{user}/password', ['as' => 'user.password', 'uses' => 'UserController@password']);
    Route::resource('user', 'UserController', ['only' => ['show', 'update']]);

    // Categories
    Route::get('category', ['as' => 'category.index', 'uses' => 'CategoryController@index']);

    // Festival
    Route::get('festival/{festival}/likeUsers', ['as' => 'festival.likeUsers', 'uses' => 'FestivalController@likeUsers']);

    Route::get('festival', ['as' => 'festival.index', 'uses' => 'FestivalController@index']);
    Route::get('festival/like', ['as' => 'festival.like', 'uses' => 'FestivalController@like']);
    Route::get('festival/disLike', ['as' => 'festival.disLike', 'uses' => 'FestivalController@disLike']);
    Route::get('festival/like/count', ['as' => 'festival.like.count', 'uses' => 'FestivalController@likeCount']);
    Route::post('festival/comment', ['as' => 'festival.comment', 'uses' => 'FestivalController@comment']);
    Route::get('festival/comment/count', ['as' => 'festival.comment.count', 'uses' => 'FestivalController@commentCount']);
    Route::get('festival/{festival}/commentUsers', ['as' => 'festival.commentUsers', 'uses' => 'FestivalController@commentUsers']);

    // Message
    Route::get('message', ['as' => 'message.index', 'uses' => 'MessageController@index']);
    Route::get('message/detail', ['as' => 'message.detail', 'uses' => 'MessageController@messageDetail']);
    Route::post('message/send', ['as' => 'message.send', 'uses' => 'MessageController@sendMessage']);

    // Draw
    Route::resource('draws', 'DrawController');
    Route::get('draw/{drawId}/join', ['as' => 'draw.{drawId}.join', 'uses' => 'DrawController@joinDraw']);
    Route::get('draw/{drawId}/disjoin', ['as' => 'draw.{drawId}.disjoin', 'uses' => 'DrawController@disJoinDraw']);
    Route::get('draw/{drawId}/users', ['as' => 'draw.{drawId}.users', 'uses' => 'DrawController@users']);
    Route::get('draw/{drawId}/count', ['as' => 'draw.{drawId}.count', 'uses' => 'DrawController@userCount']);
});