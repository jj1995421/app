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
Route::group(['middleware'=>'login'],function(){
	//后台首页的路由规则
	Route::get('/admin','AdminController@index');

	//后台用户的的路由规则
	// Route::get('admin/user/edit/{id}','UserController@edit');
	Route::controller('/admin/user','UserController');

	//后台分类管理
	Route::controller('/admin/cate','CateController');

	//后台文章管理
	Route::controller('/admin/article','ArticleController');
});
//后台登录页面
Route::get('/admin/login','LoginController@login');
Route::post('/admin/login','LoginController@dologin');


//前台首页
Route::get('/index','HomeController@index');