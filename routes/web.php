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

//cara 1 nak pas function (without buat controller)
Route::get('/', function () {
    return view('welcome');
});

//get dia akan bawak value tu dekat url
Route::get('/posts', 'PostController@index')->name('posts.index'); //routing main page for post
Route::get('/posts/create', 'PostController@create')->name('posts.create'); //routing page for create post
Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit'); //routing page for edit post

//post dia takkan show value kt url
Route::post('/posts', 'PostController@store')->name('posts.store'); //routing page for store post
Route::post('/posts/{post}', 'PostController@update')->name('posts.update'); //routing page for update post
Route::post('/posts/{post}/delete', 'PostController@delete')->name('posts.delete'); //routing page for delete post

Auth::routes();

//cara 2 nak pas function (kena buat controller)
Route::get('/home', 'HomeController@index')->name('home'); //nama controller@nama method kt file controller
