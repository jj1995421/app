<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\InsertArticleRequest;

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
        $request->file('pic')->move('./u/',$pathname);
       }
    }
}
