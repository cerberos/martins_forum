<?php

    Auth::routes();

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('admin', 'AdminController@index')->name('admin');
    Route::get('test', 'PostController@index');