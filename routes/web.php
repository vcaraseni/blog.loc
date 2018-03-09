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


Route::get('/', 'PagesController@index')->name('index');
Route::get('/users', 'PagesController@getUsers')->name('get-users');

// Facebook auth
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');

// Add like
Route::post('/', 'PagesController@liked')->name('liked');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
