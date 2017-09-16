<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('admin', 'AdminController@index')->name('admin');
Route::get('/post/create', 'PostController@create');
Route::get('/post/{id}', 'PostController@show');
Route::get('/posts', 'PostController@index');
Route::post('/post', 'PostController@store');
Route::post('/post/{id}/replies', 'ReplyController@store');
Route::get('/category/{id}', 'CategoryController@show');
Route::get('/profile/{id}', 'ProfileController@index')->name('profile');
Route::get('/profile/{id}/{name}', 'ProfileController@show');