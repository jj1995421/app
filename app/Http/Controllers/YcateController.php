<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class YcateController extends Controller
{
    //获取表中的所有分类
    public static function getAllYcate()
    {
        return DB::table('ycate')->get();
    }

    //递归方式获取数据
    public static function  getYcatesByPidArr($cates, $pid)
    {
        $data = [];
        foreach ($cates as $key => $value){
            if($value['pid'] == $pid){
                $value['sub'] = self::getYcatesByPidArr($cates, $value['id']);
                $data[] = $value;
            }
        }
        return $data;
    }

    //获取所有的分类
    public function getYcatess()
    {
        //获取所有的分类
        $arr = self::getAllYcate();
        //通过父级id获取子集元素
        $res = self::getYcatesByPidArr($arr, 0);
        //返回数据
        return  $res;
    }

    //递归方式获取分类
    public static function getYcateByPid($pid)
    {
        //读取数据库
        $res =  DB::table('ycate')->where('pid','=',$pid)->get();
        //遍历
        $data = [];
        foreach($res as $key => $value){
            $value['sub'] = self::getYcateByPid($value['id']);
            $data[] = $value; 
        }
        return $data;
    }


    //分类列表显示
    public function getIndex()
    {
       self::getYcateByPid(0);
        //读取分类信息
        $cates = self::getYcate();
        return view('ycate.index',['cates'=>$cates]);
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
    public function getAdd($id='')
    {
        $cates =  self::getYcate();
        // $cates = DB::table('ycate')->get();
        return view('ycate.add',['cates'=>$cates,'id'=>$id]);
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


    //分类的更新操作
    public function postUpdate(Request $request)
    {
        $data = array();
        //获取父级分类id参数
        $pid = $request->input('pid');
        //判断
            $data = $request->except('_token','id');
        if($pid==0){//顶级分类
            $data['path'] = '0';
        }else{
            //获取父级分类的id
            $info = DB::table('ycate')->where('id','=',$pid)->first();
            //拼接path路径
            $data['path'] = $info['path'].','.$info['id'];
        }
        //更新
        $res=DB::table('ycate')->where('id','=',$request->input('id'))->update($data);
        if($res){
            return redirect('admin/ycate/index')->with('success','修改成功');
        }else{
            return  back()->with('error','修改失败');
        }
    }

    //分类的删除操作
    public function getDelete($id)
    {
        //检测当前分类下是否有子分类
        $data = DB::table('ycate')->where('pid','=',$id)->count();
        //判断
        if($data>0){
            return  back()->with('error','对不起有子分类的分类不允许删除');
        }
        //删除
        $res = DB::table('ycate')->where('id','=',$id)->delete();
        if($res)
        {
            return  redirect('/admin/ycate/index')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
    //获取顶级分类
    public static function getTopCate()
    {
        return DB::table('ycate')->where('pid',0)->get();
    }

        //分类的修改操作
    public function getEdit($id)
    {
        //读取当前id的分类信息
        $info=DB::table('ycate')->where('id','=',$id)->first();
        return view('ycate.edit',['cates'=>self::getYcate(),'info'=>$info]);
    }

}
