<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class YeController extends Controller
{
   //文章添加页
    public function getAdd()
    {
        return view('ye.add',['cates'=>YcateController::getYcate()]);
    }

    //文章列表页面
    public function getIndex(Request $request)
    {
        $articles = DB::table('ye')
        ->where(function($query)use($request){
            if($request->input('keywords')){
                $query->where('title','like','%'.$request->input('keywords').'%');
            }
        })
        ->paginate($request->input('num',10));
        return view('ye.index',
            ['articles'=>$articles,
            'request'=>$request->all()
            ]);
    }
    //文章的插入操作
    public function postInsert(Request $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = date('Y-m-d');
        $res =  DB::table('ye')->insert($data);
        if($res){
            return  redirect('/admin/ye/index')->with('success','添加成功');
        }else{
            return back()->with('error',添加失败);
        }
    }

        //文章的修改页面
    public function getEdit($id)
    {
        //获取当前指定文章的详细信息
        $article =DB::table('ye')->where('id','=',$id)->first();
        return view('ye.edit',[
            'article'=>$article,
            'cates'=>YcateController::getYcate(),
            ]);
    }

        //文章的更新操作
    public function postUpdata(Request $request)
    {
        $data = $request->except('_token');
       //插入数据库
       if(DB::table('ye')->where('id',$request->input('id'))->update($data)){
        return redirect('/admin/ye/index')->with('success','更新成功');
       }else{
        return back()->with('error','更新失败');
       }
    }

    //删除
    function getDelete($id){
        $res = DB::table('ye')->where('id','=',$id)->delete();
        if($res)
        {
            return  redirect('/admin/ye/index')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }

    //前台业务页面显示
    public function show($id)
    {
        //读取指定id的信息
        $arcs = DB::table('ye')
        ->where('ye.id','=',$id)
        ->select('ye.*','ycate.name as yname','ycate.pid')

        ->join('ycate','ycate.id','=','ye.ycate_id')

        ->first();
        return view('yewu.show',['arcs'=>$arcs]);
    }
}
    