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

Route::get('/', 'ArticlesController@index');
Route::get('/about', 'UsersController@about');
Route::post('/users/good', 'UsersController@good');
Route::post('/users/bad', 'UsersController@bad');
Route::get('/admin-user/auth/login', 'Auth\AuthController@getLogin');
Route::get('/users/dashboad', 'UsersController@dashboad');
Route::get('/users/dashboad/{type}', 'UsersController@dashboad');
Route::get('/users/logout', 'UsersController@getLogout');
Route::get('/articles/add', 'ArticlesController@getAdd');
Route::post('/articles/add', 'ArticlesController@postAdd');
Route::post('/articles/upload_image', 'ArticlesController@upload_image');
Route::post('/articles/findImages', 'ArticlesController@findImages');
Route::get('/articles/edit/{id}', 'ArticlesController@getEdit');
Route::post('/articles/edit{id}', 'ArticlesController@postEdit');
Route::get('/search', 'ArticlesController@getSearch');
Route::post('/search', 'ArticlesController@postSearch');
Route::get('/categories', 'CategoriesController@index');
Route::get('/categories/add', 'CategoriesController@getAdd');
Route::get('/categories/{id}', 'CategoriesController@detail');
Route::post('/categories/add', 'CategoriesController@postAdd');
Route::get('/tags', 'TagsController@index');
Route::get('/tags/{id}', 'TagsController@detail');
Route::post('/comments/add', 'CommentsController@add');
Route::get('/{id}', 'ArticlesController@view');

// 認証のルート定義…
// Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');

// 登録のルート定義…
// Route::get('/auth/register', 'Auth\AuthController@getRegister');
// Route::post('/auth/register', 'Auth\AuthController@postRegister');