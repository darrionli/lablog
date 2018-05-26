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



/**
 * 后台
 */
Route::prefix('backend')->namespace('Backend')->group(function(){
    Route::get('login', 'LoginController@index')->name('back.login');
    Route::post('login', 'LoginController@store')->name('back.login');
    Route::delete('logout', 'LoginController@logout')->name('back.logout');

    Route::get('home', 'HomeController@index')->name('back.home');
});
