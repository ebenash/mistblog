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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/posts', 'PostsController@index');
Route::get('/posts/user/{id}', 'PostsController@userposts')->name('userposts');
Route::get('/posts/create', 'PostsController@create')->name('postcreate');
Route::post('/posts/store', 'PostsController@store')->name('poststore');
Route::post('/posts/update', 'PostsController@update')->name('postupdate');
Route::get('/posts/{id}', 'PostsController@show')->name('postshow');
Route::get('/posts/edit/{id}', 'PostsController@edit')->name('postedit');
Route::get('/posts/delete/{id}', 'PostsController@destroy')->name('postdelete');


