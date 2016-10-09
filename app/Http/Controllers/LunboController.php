<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
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
        //处理数据
        $data = $this->dealRequest($request);
       //插入数据库
       if(DB::table('lunbo')->insert($data)){
        return redirect('/admin/lunbo/index')->with('success','添加成功');
       }else{
        return back()->with('error','添加失败');
       }
    }

    //处理数据
    private function dealRequest(Request $request)
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
       return $data;
    }

    //图片删除操作
    public function getDelete($id)
    {
        //检测图片
        $res = DB::table('lunbo')->where('id',$id)->first();
        //检测图片是否存在
        $path = $res['pic'];
        if(file_exists($path)){
            unlink($path);
        }
    if(DB::table('lunbo')->where('id',$id)->delete()){
        return redirect('admin/lunbo/index')->with('success','删除成功');
    }else{
        return back()->with('error','删除失败');
    }
    }



}
