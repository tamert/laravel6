<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|

*/


Route::group(['prefix' => 'post'], function () {
    Route::get('/', 'PostController');
    Route::get('/{id}', 'PostController@show');
});


Route::group(['prefix' => 'comment', 'middleware' => 'auth'], function () {
    Route::patch('add', 'CommentController@add');
});
