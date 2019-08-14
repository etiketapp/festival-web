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


// Message
Route::get('message/{user}', ['as' => 'message.{user}.index', 'uses' => 'MessageController@index']);
Route::post('message/{user}/send', ['as' => 'message.{user}.send', 'uses' => 'MessageController@sendMessage']);

Route::group(['middleware' => 'auth:api'], function () {
    // User
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


});