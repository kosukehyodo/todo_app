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

    Auth::routes(); //パスワードリセット用
    Route::resource('/', 'WelcomeController');

    Route::resource('user', 'UserController')->only(['create', 'store', 'index']);
    Route::name('user.')->prefix('user')->group(function () {
        Route::post('/home', 'UserController@signup')->name('signup');
        Route::get('/login', 'UserController@login')->name('login');
        Route::get('/logout', 'UserController@logout')->name('logout')->middleware('auth');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('board', 'BoardController')->only(['show', 'store', 'destroy']);
    });
