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
Route::get('/categories/{slug?}', 'Frontend\CategoriesController@show');
Route::get('/{slug}', 'Frontend\PostController@show');

/**
 * Auth
 */
Route::group(['namespace' => 'Auth'], function() {
	Route::get('login', 'AuthController@getLogin');
	Route::post('login', 'AuthController@postLogin');
	Route::get('logout', 'AuthController@getLogout');
	Route::get('register', 'AuthController@getRegister');
	Route::post('register', 'AuthController@postRegister');
});

/**
 * Backend
 */
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	Route::get('/', 'Backend\DashboardController@index');
	Route::resource('posts', 'Backend\PostsController');
	Route::resource('media', 'Backend\MediaController');
	Route::resource('categories', 'Backend\CategoriesController');
	Route::resource('users', 'Backend\UsersController');
	Route::resource('user-groups', 'Backend\UserGroupsController');
});
