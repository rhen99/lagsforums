<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PostsController@index');
Route::get('/show/{id}', 'PostsController@show');
Route::get('/{id}/edit', 'PostsController@edit');
Route::get('/create', 'PostsController@create');
Route::post('/vote', 'VotesController@post_vote')->name('vote');

Route::post('/store', 'PostsController@store');
Route::put('/{id}', 'PostsController@update');
Route::delete('/{id}', 'PostsController@destroy');
Route::post('/comment/{id}', 'CommentsController@store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{id}/edit_user', 'HomeController@edit_user');
Route::put('/update_user/{id}', 'HomeController@update_user');
