<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LunboController extends Controller
{
   public function getIndex()
   {
    $res = DB::table('lunbo')->get();
    return view('lunbo.index',['res'=>$res]);
   }

   //图片添加页面
   public function getAdd()
   {
    return view('lunbo.add');
   }

   //图片添加操作
   public function postInsert(Request $request)
   {
    $data = $request->except(['_token']);
    //检测是否有文件上传
   if($request->hasFile('pic')){
    //拼接文件名称
    $pathname = time().rand(100000,999999).'.'.$request->file('pic')->getClientOriginalExtension();
    //上传文件
    $request->file('pic')->move(Config::get('app.upload_dir'),$pathname);
    //拼接上传路径
    $data['pic'] = trim(Config::get('app.upload_dir').$pathname,'.');
   }
      //插入数据库
   if(DB::table('lunbo')->insert($data)){
    return redirect('/admin/lunbo/index')->with('success','添加成功');
   }else{
    return back()->with('error','添加失败');
   }
   }


}
