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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// List posts
Route::get('posts', 'Api\PostApiController@index');

// List single post
Route::get('post/{id}', 'PostController@show');


Route::get('/login','Api\PostApiController@accessToken');
Route::get('/like/{id}','Api\PostApiController@likeDislike');
