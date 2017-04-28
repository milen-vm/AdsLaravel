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

Route::get('/', 'AdsController@index')->name('ad.index');
Route::get('/ads/create', 'AdsController@create');
Route::get('/ads/{ad}', 'AdsController@show');
Route::get('ads/{ad}/edit', 'AdsController@edit');
Route::post('/ads', 'AdsController@store');
Route::patch('/ads/{ad}', 'AdsController@update');
Route::delete('/ads/{ad}', 'AdsController@destroy');
Route::post('/ads/{ad}/comments', 'CommentsController@store');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
Route::get('/login', ['as' =>'login', 'uses' => 'SessionsController@create']);
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

