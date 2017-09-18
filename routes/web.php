<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::delete('/reply/{id}', 'ReplyController@destroy');
Route::patch('/reply/{id}', 'ReplyController@patch');
Route::get('/post/create', 'PostController@create');
Route::get('/post/{id}', 'PostController@show');
Route::delete('/post/{id}', 'PostController@destroy');
Route::patch('/post/{id}', 'PostController@patch');
Route::get('/posts', 'PostController@index');
Route::post('/post', 'PostController@store');
Route::post('/post/{id}/replies', 'ReplyController@store');
Route::get('/category/{id}', 'CategoryController@show');
Route::get('/profile/{id}', 'ProfileController@index')->name('profile');
Route::delete('/profile/{id}', 'AdminController@destroyUser');
Route::get('/profile/{id}/{name}', 'ProfileController@show');
Route::post('/search', 'SearchController@index');

Route::get('admin', 'AdminController@index')->name('admin');
Route::get('/admin/categories', 'AdminController@categories');
Route::get('/admin/users', 'AdminController@users');

Route::post('/search/user', 'SearchController@userSearch');
Route::post('/search/category', 'SearchController@categorySearch');
Route::post('/search/post', 'SearchController@postSearch');
Route::post('/search/reply', 'SearchController@replySearch');
Route::post('/search/postTime', 'SearchController@postTimeSearch');
