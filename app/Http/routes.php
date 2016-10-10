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

Route::get('/','HomeController@index');
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

	//轮播管理
	Route::controller('/admin/lunbo','LunboController');


	//后台业务分类管理
	// Route::controller('/admin/ycate','YcateController');

	//后台业务文章管理
	// Route::controller('/admin/ye','YeController');
});
//后台登录页面
Route::get('/admin/login','LoginController@login');
Route::post('/admin/login','LoginController@dologin');


//前台首页
Route::get('/index','HomeController@index');

//业务介绍页
Route::get('/ye-{id}','YeController@show');

//验证码显示的路由  该项目用不上.
Route::get('/vcode','CommonController@createVcode');

//前台文章显示
Route::get('/p_detail-{id}','ArticleController@show');

//前台业务介绍页
Route::get('/business','HomeController@business');

//前台新闻列表页
Route::get('/news_list','HomeController@news');

//前台公司概况列表页
Route::get('/profile','HomeController@profile');

//通知公告页
Route::get('/tz_list','HomeController@tz_list');

//党群窗口页
Route::get('/dq_list','HomeController@dq_list');

//政策法规页
Route::get('/zc_list','HomeController@zc_list');

//公司文化页
Route::get('/culture','HomeController@culture');

//用户服务页
Route::get('/service','HomeController@service');

//热点答疑
Route::get('/service_hot','HomeController@hot');

//简易排障
Route::get('service_solve','HomeController@solve');

//缴费方式
Route::get('service_pay','HomeController@pay');

//标清业务介绍页
Route::get('/board_fu','HomeController@bboard');

//标清业务付费
Route::get('/board_fu_offer','HomeController@boffer');

//高清业务介绍
Route::get('/board_gao','HomeController@gao');

//高清业务指南
Route::get('/board_gao_use','HomeController@gaouse');
//高清业务办理
Route::get('/board_gao_offer','HomeController@gaouof');
//轮播介绍
Route::get('/board_lun','HomeController@lun');
//轮播指南
Route::get('/board_lun_use','HomeController@lunuse');

//家庭宽带
Route::get('/kuan_home','HomeController@hkuan');
//集团宽带
Route::get('/kuan_group','HomeController@jtkuan');

//影视点播_业务介绍
Route::get('/dian_bo','HomeController@dian');
//影视点播_使用指南
Route::get('/dian_bo_use','HomeController@usedian');

//电视回看_业务介绍
Route::get('/dian_back','HomeController@back');

//轮播业务_办理
Route::get('/board_lun_offer','HomeController@loffer');

//回看指南
Route::get('/dian_back_use','HomeController@useback');







