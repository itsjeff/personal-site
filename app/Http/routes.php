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

/**
 * Backend
 */
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Backend'], function() {
	Route::get('/', 'DashboardController@index');
	Route::resource('posts', 'PostsController');
	Route::resource('media', 'MediaController');
	Route::resource('categories', 'CategoriesController');
	Route::resource('users', 'UsersController');
	Route::resource('groups', 'UserGroupsController');
});

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
 * Frontend
 */
Route::get('/', 'Frontend\HomeController@index');
Route::get('/categories/{slug?}', 'Frontend\CategoriesController@show');
Route::get('/{slug}', 'Frontend\PostsController@show');