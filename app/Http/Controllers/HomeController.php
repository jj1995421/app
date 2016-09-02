<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	//前台首页的显示
   public function index()
   {
    return view('home.index');
   }

   //前台业务介绍页的显示
   public function business()
   {
   	return view('home.business');
   }

   //前台新闻列表页
   public function news()
   {
   	return view('home.news_list');
   }
}
