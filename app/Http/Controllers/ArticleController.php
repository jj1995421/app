<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\InsertArticleRequest;
use DB;

class ArticleController extends Controller
{
    //文章添加页面
    public function getAdd()
    {
        return view('article.add',['cates'=>CateController::getCates()]);
    }

    //文章添加操作
    public function postInsert(InsertArticleRequest $request)
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
       $data['user_id'] = 1;
       $data['created_at'] = date('Y-m-d H:i:s');
       //插入数据库
       if(DB::table('articles')->insert($data)){
        return redirect('/admin/article/index')->with('success','添加成功');
       }else{
        return back()->with('error','添加失败');
       }
    }

    //文章列表页面
    public function getIndex(Request $request)
    {
        $articles = DB::table('articles')
        ->where(function($query)use($request){
            if($request->input('keywords')){
                $query->where('title','like','%'.$request->input('keywords').'%');
            }
        })
        ->paginate($request->input('num',10));
        return view('article.index',
            ['articles'=>$articles,
            'request'=>$request->all()
            ]);
    }

    //文章的修改页面
    public function getEdit($id)
    {
        //获取当前指定文章的详细信息
        $article =DB::table('articles')->where('id','=',$id)->first();
        return view('article.edit',[
            'article'=>$article,
            'cates'=>CateController::getCates(),
            ]);
    }

    //文章的更新操作
    public function postUpdata(InsertArticleRequest $request)
    {

    }
}