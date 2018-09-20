<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/**
 * 前台路由
 */
Route::group(['namespace' => 'jayfong'], function (){
    //首页
    Route::get('/', 'JayfongController@index')->name('index');

    //关于页
    Route::get('/about', 'JayfongController@about')->name('about');

    //文章页
    Route::get('/article/{id}', 'JayfongController@show')->name('article');
});

/**
 * 登录单页
 */
Route::get('admin/login', 'admin\AdminController@login');
Route::post('admin/login', 'admin\AdminController@loginPost')->name('loginPost');


/**
 * 后台路由
 */
Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware' => 'auth'], function (){
    //后台首页
    Route::get('/', 'AdminController@index')->name('admin::home');
    //退出登录
    Route::get('/logout', 'AdminController@logout')->name('logout');
    //修改密码
    Route::get('/password', 'AdminController@password')->name('password');
    Route::post('/password', 'AdminController@passPost')->name('passPost');

    //文章路由
    Route::group(['prefix' => 'article'], function (){
        //文章列表
        Route::get('/', 'ArticleController@index')->name('article::index');
        //创建文章页面
        Route::get('/create', 'ArticleController@article_create')->name('article::create');
        //上传图片
        Route::any('/upload', 'ArticleController@upload');
        //发布文章
        Route::post('/create_article', 'ArticleController@store')->name('create_article');
        //修改文章
        Route::get('/{id}/edit', 'ArticleController@edit')->name('article::edit');
        //更新文章
        Route::post('/{id}/update', 'ArticleController@update')->name('update_article');
        //删除文章
        Route::delete('/{id}', 'ArticleController@destroy')->name('delete_article');
    });

    //tag
    Route::group(['prefix' => 'tag'], function (){
        //tag列表
        Route::get('/', 'TagController@index')->name('tag::index');
        //创建tag
        Route::get('/create', 'TagController@create')->name('tag::create');
        //创建tag处理
        Route::post('/create_tag', 'TagController@store')->name('create_tag');
        //修改tag
        Route::get('/{id}/edit', 'TagController@edit')->name('tag::edit');
        //修改tag处理
        Route::post('/{id}/update', 'TagController@update')->name('update_tag');
        //删除tag
        Route::delete('/{id}', 'TagController@destroy')->name('delete_tag');
    });

    //友情链接
    Route::group(['prefix' => 'links'], function (){
        //友情类表
        Route::get('/', 'LinksController@index')->name('links::index');
        //创建友链
        Route::get('/create', 'LinksController@links_create')->name('links::create');
        //创建友链处理
        Route::post('/create_links', 'LinksController@store')->name('create_links');
        //修改友情链接
        Route::get('/{id}/edit', 'LinksController@edit')->name('links::edit');
        //更新友情链接处理
        Route::post('/{id}/update', 'LinksController@update')->name('update_links');
        //删除友情链接
        Route::delete('/{id}', 'LinksController@destroy')->name('delete_link');
    });
});