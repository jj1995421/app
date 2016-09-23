<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class YcateController extends Controller
{
    //分类列表显示
    public function getIndex()
    {
        return view('ycate.index');
    }

    //获取分类下所有的分类  按照sql顺序来获取
    public static function getYcate()
    {
        $res = DB::table('ycate')
            ->select(DB::raw('id,path,pid,name,concat(path,",",id) as paths'))
            ->orderBy('paths')
            ->get();

        //调整分类名称
            foreach($res as $key => $value){
                //拆分数组
                $tmp = explode(',', $value['path']);
                $len = count($tmp) - 1;
                $res[$key]['name'] = str_repeat('|----', $len).$value['name'];
            }
        return  $res;
    }

    //分类的添加页面显示
    public function getAdd()
    {
        $cates =  self::getYcate();
        // $cates = DB::table('ycate')->get();
        return view('ycate.add',['cates'=>$cates]);
    }

    //分类的插入操作
    public function postInsert(Request $request)
    {   
        $data = array();    
        //获取父级分类id
        $pid = $request->input('pid');

        $data = $request->except('_token');
        if($pid == 0){
            //顶级分类
            $data['path'] = '0';
        }else{
            //获取pid并且读取父级分类的信息
            $info = DB::table('ycate')->where('id','=',$pid)->first();  
            //拼接路径
            $data['path'] = $info['path'].','.$info['id'];
        }


        $res = DB::table('ycate')->insert($data);
        if($res){
            return redirect('/admin/ycate/index')->with('success','添加成功');
       }else{
        return redirect('/admin/ycate/add')->with('error','添加失败');
       }
    }



}
