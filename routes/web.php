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
 * 前台相关
 */
Route::group(['namespace'=>'Home'], function(){
    Route::get('/', 'IndexController@index')->name('home.index');
    Route::get('article/{id}', 'IndexController@article');
    Route::get('category/{id}', 'IndexController@category');
    Route::get('tag/{id}', 'IndexController@tag');
    Route::get('about','IndexController@about')->name('home.about');
});

// 前台登录
Route::group(['namespace'=>'Auth'], function(){
    Route::get('oauth/weibo', 'OauthController@wbLogin')->name('oauth.weibo.login');
    Route::get('oauth/redirect_weibo', 'OauthController@callback_weibo');
    Route::get('oauth/logout', 'OauthController@logout')->name('oauth.logout');
});

/**
 * 后台登录模块
 */
Route::group(['prefix'=>'backend', 'namespace'=>'Backend'], function(){
    Route::get('login', 'LoginController@index')->name('back.login')->middleware('admin.login');
    Route::post('login', 'LoginController@store')->name('back.login');
    Route::post('logout', 'LoginController@logout')->name('back.logout');
});

/**
 * 后台其他功能
 */
Route::group(['prefix'=>'backend', 'namespace'=>'Backend', 'middleware'=>'admin.auth'], function(){
    Route::get('home', 'HomeController@index')->name('back.home');

    // 文章管理
    Route::group(['prefix'=>'article'], function(){
        // 文章列表
        Route::get('index', 'ArticleController@index')->name('back.art.index');
        // 添加文章
        Route::get('create', 'ArticleController@create')->name('back.art.create');
        Route::post('store', 'ArticleController@store')->name('back.art.store');
        Route::post('uploadimg', 'ArticleController@uploadImg')->name('back.art.upload');
        // 文章编辑
        Route::get('edit/{id}', 'ArticleController@edit')->name('back.art.edit');
        Route::get('markdown/{id}', 'ArticleController@markdown');
        Route::post('update/{id}', 'ArticleController@update')->name('back.art.update');
        // 文章删除
        Route::get('destroy/{id}', 'ArticleController@destroy')->name('back.art.destroy');
        // 文章恢复
        Route::get('restore/{id}', 'ArticleController@restore')->name('back.art.restore');
    });

    // 分类管理
    Route::group(['prefix'=>'category'], function(){
        // 列表
        Route::get('index', 'CategoryController@index')->name('back.cate.index');
        // 添加
        Route::get('create', 'CategoryController@create')->name('back.cate.create');
        Route::post('store', 'CategoryController@store')->name('back.cate.store');
        // 更新
        Route::get('edit/{id}', 'CategoryController@edit')->name('back.cate.edit');
        Route::post('update/{id}', 'CategoryController@update')->name('back.cate.update');
        // 删除
        Route::get('destroy/{id}', 'CategoryController@destroy')->name('back.cate.destroy');
        // 恢复
        Route::get('restore/{id}', 'CategoryController@restore')->name('back.cate.restore');
    });

    // 标签管理
    Route::group(['prefix'=>'label'], function(){
        // 列表
        Route::get('index', 'LabelController@index')->name('back.label.index');
        // 添加
        Route::get('create', 'LabelController@create')->name('back.label.create');
        Route::post('store', 'LabelController@store')->name('back.label.store');
        // 更新
        Route::get('edit/{id}', 'LabelController@edit')->name('back.label.edit');
        Route::post('update/{id}', 'LabelController@update')->name('back.label.update');
        // 删除
        Route::get('destroy/{id}', 'LabelController@destroy')->name('back.label.destroy');
        // 恢复
        Route::get('restore/{id}', 'LabelController@restore')->name('back.label.restore');
    });

    // 友情链接管理
    Route::group(['prefix'=>'friendship'], function(){
        // 列表
        Route::get('index', 'FriendshipController@index')->name('back.friend.index');
        // 添加
        Route::get('create', 'FriendshipController@create')->name('back.friend.create');
        Route::post('store', 'FriendshipController@store')->name('back.friend.store');
        // 更新
        Route::get('edit/{id}', 'FriendshipController@edit')->name('back.friend.edit');
        Route::post('update/{id}', 'FriendshipController@update')->name('back.friend.update');
        // 删除
        Route::get('destroy/{id}', 'FriendshipController@destroy')->name('back.friend.destroy');
        // 恢复
        Route::get('restore/{id}', 'FriendshipController@restore')->name('back.friend.restore');
    });


    // 网站管理
    Route::group(['prefix'=>'config'], function(){
        Route::get('index', 'ConfigController@index')->name('back.config.index');
        Route::post('store', 'ConfigController@store')->name('back.config.store');
        Route::get('clear', 'ConfigController@clear')->name('back.config.clear');
    });
});
