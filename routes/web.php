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
    // 登录
    Route::get('login', 'LoginController@index')->name('back.login');
    Route::post('login', 'LoginController@store')->name('back.login');
    Route::delete('logout', 'LoginController@logout')->name('back.logout');
});

Route::group(['prefix'=>'backend', 'namespace'=>'Backend'], function(){
    // 首页
    Route::get('home', 'HomeController@index')->name('back.home');

    // 文章管理
    Route::group(['prefix'=>'article'], function(){
        // 文章列表
        Route::get('index', 'ArticleController@index')->name('back.art.index');
        // 添加文章
        Route::get('create', 'ArticleController@create')->name('back.art.create');
        Route::post('store', 'ArticleController@store')->name('back.art.store');
        // 文章编辑
        Route::get('edit/{id}', 'ArticleController@edit')->name('back.art.edit');
        Route::post('update/{id}', 'ArticleController@update')->name('back.art.update');
        // 文章删除
        Route::get('destroy/{id}', 'ArticleController@destroy')->name('back.art.destroy');
        // 文章恢复
        Route::get('restore/{id}', 'ArticleController@restore')->name('back.art.restore');
    });

    // 分类管理
    Route::group(['prefix'=>'category'], function(){
        // 分类列表
        Route::get('index', 'CategoryController@index')->name('back.cate.index');
    });
});
