<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	//前台首页的显示
   public function index()
   {
      //新闻动态
      $arcs = DB::table('articles')
      ->whereIn('cate_id',[1])
      ->orderBy('id','desc')
      ->skip(0)
      ->take(13)
      ->get();

      $arcsq = DB::table('articles')
      ->whereIn('cate_id',[1])
      ->orderBy('id','desc')
      ->skip(0)
      ->take(1)
      ->get();
      //通知公告
      $arcs2 = DB::table('articles')
      ->whereIn('cate_id',[7])
      ->orderBy('id','desc')
      ->skip(0)
      ->take(9)
      ->get();
     //党群窗口
      $arcs3 = DB::table('articles')
      ->whereIn('cate_id',[8])
      ->orderBy('id','desc')
      ->skip(0)
      ->take(9)
      ->get();
      //政策法规
      $arcss = DB::table('articles')
      ->whereIn('cate_id',[4])
      ->orderBy('id','desc')
      ->skip(0)
      ->take(7)
      ->get();
      //分配变量到view
      return view('home.index',['sqq'=>$arcs,'sqq2'=>$arcs2,'sqq3'=>$arcs3,'sqqq'=>$arcss,'arcsq'=>$arcsq]);

   }


   //前台业务介绍页的显示
   public function business()
   {
   	return view('home.business');
   }

   //前台新闻列表页
   public function news()
   {
      $arcs = DB::table('articles')
      ->where('cate_id',1)
      ->orderBy('id','desc')
      ->paginate(10);
   	return view('home.news_list',[
         'arcs'=>$arcs
         ]);
   }

   //前台公司概况
   public function profile()
   {
      return view('home.profile');
   }

   //前台通知公告页
   public function tz_list()
   {
      $arcs = DB::table('articles')
      ->where('cate_id',4)
      ->orderBy('id','desc')
      ->paginate(10);
      return view('home.tz_list',['arcs'=>$arcs]);
   }

   //党群窗口页
   public function dq_list()
   {
      $arcs = DB::table('articles')
      ->where('cate_id',7)
      ->orderBy('id','desc')
      ->paginate(10);
      return view('home.dq_list',['arcs'=>$arcs]);
   }

   //政策法规页
   public function zc_list()
   {
      $arcs = DB::table('articles')
      ->where('cate_id',8)
      ->orderBy('id','desc')
      ->paginate(10);
      return view('home.zc_list',['arcs'=>$arcs]);
   }

   //企业文化
   public function culture()
   {
      return view('home.culture');
   }

   //用户服务
   public function service()
   {
      return view('home.service');
   }

   //前台进入标清业务介绍页
   public function bboard()
   {
      return view('yewu.board_fu');
   }

   //待续
}