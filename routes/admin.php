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
    Route::resource('contract', 'ContractController', ['only' => 'index', 'show']);

});