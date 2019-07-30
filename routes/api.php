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

Route::resource('sale', 'SaleController');

Route::group(['middleware' => 'auth:api'], function () {
    // User
    Route::put('user/{user}/password', ['as' => 'user.password', 'uses' => 'UserController@password']);
    Route::resource('user', 'UserController', ['only' => ['show', 'update']]);

    // Wanted
//    Route::post('wanted/post', ['as' => 'wanted.post', 'uses' => 'WantedController@store']);
    Route::resource('wanted', 'WantedController');

    // Sale
//    Route::post('sale/post', ['as' => 'sale.post', 'uses' => 'SaleController@store']);
    Route::resource('sale', 'SaleController');

    // Messages
    Route::post('messages/post/{id}', ['as' => 'messages.post.{id}', 'uses' => 'MessageController@store']);
    Route::resource('messages', 'MessageController', ['only' => 'index', 'show', 'destroy']);

});