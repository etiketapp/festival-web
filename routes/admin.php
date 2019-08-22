<?php

// Auth
Route::get('login', ['as' => 'login', 'uses' => 'AuthController@getLogin']);
Route::post('login', ['as' => 'login', 'uses' => 'AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@getLogout']);

Route::group(['middleware' => 'auth:admin'], function () {

    // Dashboard
    Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);
    Route::resource('home', 'HomeController');

    // Admin
    Route::get('admin/datatable', ['as' => 'admin.datatable', 'uses' => 'AdminController@datatable']);
    Route::resource('admin', 'AdminController');

    // User
    Route::get('user/datatable', ['as' => 'user.datatable', 'uses' => 'UserController@datatable']);
    Route::resource('user', 'UserController');

    // Contract
    Route::get('contract/datatable', ['as' => 'contract.datatable', 'uses' => 'ContractController@datatable']);
    Route::resource('contract', 'ContractController');

    // Festival
    Route::get('festival/datatable', ['as' => 'festival.datatable', 'uses' => 'FestivalController@datatable']);
    Route::get('festival/ajax/div', ['as' => 'festival.ajax.div', 'uses' => 'FestivalController@ajaxDiv']);
    Route::post('festival/{draw}/ajax/delete', ['as' => 'festival.ajax.delete', 'uses' => 'FestivalController@ajaxDelete']);
    Route::resource('festival', 'FestivalController');

    // Category
    Route::get('category/datatable', ['as' => 'category.datatable', 'uses' => 'CategoryController@datatable']);
    Route::resource('category', 'CategoryController');

    // Draw
    Route::get('draw/datatable', ['as' => 'draw.datatable', 'uses' => 'DrawController@datatable']);
    Route::get('draw/makeDrawGet', ['as' => 'draw.makeDrawGet', 'uses' => 'DrawController@makeDrawGet']);
    Route::post('draw/makeDrawPost', ['as' => 'draw.makeDrawPost', 'uses' => 'DrawController@makeDrawPost']);
    Route::get('draw/ajax/div', ['as' => 'draw.ajax.div', 'uses' => 'DrawController@ajaxDiv']);
    Route::post('draw/{draw}/ajax/delete', ['as' => 'draw.ajax.delete', 'uses' => 'DrawController@ajaxDelete']);
    Route::resource('draw', 'DrawController');

    // Draw Winner User
    Route::get('drawwinner/datatable', ['as' => 'drawwinner.datatable', 'uses' => 'DrawWinnerController@datatable']);
    Route::get('drawwinner/index', ['as' => 'drawwinner.index', 'uses' => 'DrawWinnerController@index']);
});