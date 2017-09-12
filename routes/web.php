<?php

    Auth::routes();

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('admin', 'AdminController@index')->name('admin');
    Route::get('/post/create','PostController@create');
    Route::get('/post/{id}', 'PostController@show');
    Route::post('/post', 'PostController@store');
    Route::post('/post/{post}/replies', 'ReplyController@store');