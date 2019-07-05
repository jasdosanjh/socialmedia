<?php

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::get('/user', 'AuthController@user');
Route::post('/logout', 'AuthController@logout');

Route::group(['prefix' => 'tweets'], function() {
    Route::post('/', 'TweetController@store')->middleware('auth:api');
    Route::get('/', 'TweetController@index');
    Route::get('/{tweet}', 'TweetController@show');
    Route::patch('/{tweet}', 'TweetController@update')->middleware('auth:api');
    Route::delete('/{tweet}', 'TweetController@destroy')->middleware('auth:api');

    // Comments Route Group
    Route::group(['prefix' => '/{tweet}/comments'], function() {
        Route::get('/{comment}', 'CommentController@show');
        Route::post('/', 'CommentController@store')->middleware('auth:api');
        Route::patch('/{comment}', 'CommentController@update')->middleware('auth:api');
        Route::delete('/{comment}', 'CommentController@destroy')->middleware('auth:api');
    });
});
