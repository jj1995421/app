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
        //处理数据
        $data = $this->dealRequest($request);
       $data['created_at'] = date('Y-m-d');
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
        $data = $this->dealRequest($request);
       //插入数据库
       if(DB::table('articles')->where('id',$request->input('id'))->update($data)){
        return redirect('/admin/article/index')->with('success','更新成功');
       }else{
        return back()->with('error','更新失败');
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
       $data['user_id'] = 1;
       return $data;
    }

    //文章的删除操作
    public function getDelete($id)
    {
        //检测图片
        $article = DB::table('articles')->where('id',$id)->first();
        //检测图片是否存在
        $path = '.'.$article['pic'];
        if(file_exists($path)){
            unlink($path);
        }
    if(DB::table('articles')->where('id',$id)->delete()){
        return redirect('admin/article/index')->with('success','删除成功');
    }else{
        return back()->with('error','删除失败');
    }
    }

    //前台文章显示
    public function show($id)
    {
        //读取指定id的文章信息
        $arcs = DB::table('articles')
        ->where('id','=',$id)
        ->first();

        //展现内容
        return view('home.p_detail',['arcs'=>$arcs]);
    }
}