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

Route::get('/', 'UserController@index')->name('index')->middleware('login');

Route::get('login', 'UserController@login')->name('login');
Route::post('/post-login', 'UserController@postLogin');
Route::get('/logout', 'UserController@logout')->name('logout');
Route::get('/edit/{id}', 'UserController@edit');

Route::post('/update', 'UserController@update');

Route::get('/form', function () {
	return view('form');
});

Route::post('post-form', 'FormController@postForm');