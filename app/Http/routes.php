<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::controller('auth', 'Auth\AuthController');

Route::get('account', ['as' => 'user.edit', 'uses' => 'UsersController@edit']);
Route::get('/', ['as' => 'tweet.index', 'uses' => 'TweetsController@index']);
Route::get('tweet/all', ['as' => 'tweet.all_show', 'uses' => 'TweetsController@all_show']);

Route::post('password', ['as' => 'password.update', 'uses' => 'Auth\AuthController@update']);

Route::resource('friend', 'FriendsController');
Route::resource('tweet', 'TweetsController', ['except' => ['create', 'edit', 'index']]);
Route::resource('user', 'UsersController', ['except' => ['create', 'edit', 'store']]);