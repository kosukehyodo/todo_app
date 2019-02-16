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
        Route::post('/login', 'UserController@login')->name('user.login');
        Route::get('/add', 'UserController@add')->name('user.add');
        Route::post('/store', 'UserController@store')->name('user.store');
        Route::get('/profile', 'UserController@profile')->name('user.profile');
    });
