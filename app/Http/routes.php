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

Route::get('/', 'WelcomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');
Route::post('/add', 'StatusController@add');

Route::get('/profile', 'ProfileController@index');
Route::get('/profile/edit/{id}','ProfileController@showEditForm');
Route::post('/profile/edit/', 'ProfileController@edit');
Route::get('/profile/upload/{id}', 'ProfileController@showUploadForm');
Route::post('/profile/upload', 'ProfileController@upload');
Route::get('/followers', 'FriendController@followers');
Route::post('/following/delete', 'FriendController@delete');
Route::get('/following', 'FriendController@following');
Route::get('/people', 'FriendController@people');
Route::post('/people/add', 'FriendController@addFriend');