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

    Route::get('/', 'UserController@index')->name('user.index');

    Route::prefix('user')->group(function () {
        Route::get('/login', 'UserController@login')->name('user.login');
        Route::get('/add', 'UserController@add')->name('user.add');
        Route::post('/{name}', 'UserController@signup')->name('user.signup');
        Route::post('/store', 'UserController@store')->name('user.store');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('board', 'BoardController')->only(['index', 'store']);
    });
