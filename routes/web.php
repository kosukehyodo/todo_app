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

    Route::resource('/', 'WelcomeController');

    Route::resource('user', 'UserController')->only(['create', 'store']);
    Route::prefix('user')->group(function () {
        Route::post('/home', 'UserController@signup')->name('user.signup')->middleware('redirect');
        Route::get('/login', 'UserController@login')->name('user.login');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('user/logout', 'UserController@logout')->name('user.logout');
        Route::resource('board', 'BoardController')->only(['index', 'store']);
    });
