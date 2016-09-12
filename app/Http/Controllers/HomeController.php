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
      $arcs = DB::table('articles')
      ->whereIn('cate_id',[1])
      ->orderBy('id','desc')
      ->skip(0)
      ->take(13)
      ->get();

      $arcs2 = DB::table('articles')
      ->whereIn('cate_id',[4])
      ->orderBy('id','desc')
      ->skip(0)
      ->take(9)
      ->get();
     
      $arcs3 = DB::table('articles')
      ->whereIn('cate_id',[7])
      ->orderBy('id','desc')
      ->skip(0)
      ->take(9)
      ->get();

      $arcss = DB::table('articles')
      ->whereIn('cate_id',[8])
      ->orderBy('id','desc')
      ->skip(0)
      ->take(7)
      ->get();



      return view('home.index',['sqq'=>$arcs,'sqq2'=>$arcs2,'sqq3'=>$arcs3,'sqqq'=>$arcss]);

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
         'allcates'=>CateController::getCatesByPid(0),
         'arcs'=>$arcs
         ]);
   }
}
