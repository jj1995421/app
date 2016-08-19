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

Route::get('/', function () {
    return view('welcome');
});

//后台首页的路由规则
Route::get('/admin','AdminController@index');

//后台用户的的路由规则
// Route::get('admin/user/edit/{id}','UserController@edit');
Route::controller('/admin/user','UserController');

//后台分类管理
Route::controller('/admin/cate','CateController');