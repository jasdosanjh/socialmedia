<?php

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::get('/user', 'AuthController@user');
Route::post('/logout', 'AuthController@logout');

Route::group(['prefix' => 'tweets'], function() {
    Route::post('/', 'TweetController@store')->middleware('auth:api');
    Route::get('/', 'TweetController@index');
    Route::get('/{tweet}', 'TweetController@show');
});
