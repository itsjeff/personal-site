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

Route::get('/', 'Frontend\HomeController@index');

Route::group(['namespace' => 'Auth'], function() {
	Route::get('login', 'AuthController@getLogin');
	Route::post('login', 'AuthController@postLogin');
	Route::get('logout', 'AuthController@getLogout');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	Route::get('/', function() {
		echo 'asfas';
	});

	Route::resource('posts', 'Backend\PostsController');
});
