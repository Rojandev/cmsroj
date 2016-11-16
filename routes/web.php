<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function()
{
	Route::get('admin', 'AdminController@index');

	//Pages 
	Route::resource('admin/pages', 'PagesController');

	// Users
	Route::resource('admin/users', 'UserController');

	//Posts
	Route::resource('admin/posts', 'PostsController');
	//Posts Category
	Route::get('admin/posts/category', 'PostCategoryController@index');

	//Settings
	Route::resource('admin/settings', 'SettingsController');
});