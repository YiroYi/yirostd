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

Route::get('/','PublicController@index')->name('/');
Route::get('about','PublicController@about')->name('about');
Route::get('class','PublicController@class')->name('class');
Route::get('membership','PublicController@membership')->name('membership');
Route::get('schedule','PublicController@schedule')->name('schedule');
Route::get('diet','PublicController@diet')->name('diet');
Route::get('store','PublicController@store')->name('store');
