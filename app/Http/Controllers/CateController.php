<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CateController extends Controller
{

    //分类列表显示
    public function getIndex()
    {
            self::getCatesByPid(0);
            //读取分类
            $cates = self::getCates();
            return view('cate.index',['cates'=>$cates]);
    }


    //获取表中的所有分类
    public static function getAllCate()
    {
        return DB::table('cates')->get();
    }

    //递归方式获取所有数据
    public static function getCatesByPidArr($cates,$pid)
    {
        //遍历数组
        $data = [];
        foreach ($cates as $key => $value) {
            if($value['pid'] == $pid){
                $value['sub'] = self::getCatesByPidArr($cates,$value['id']);
                $data[] = $value;
            }
        }
        return $data;
    }

    //获取所有的分类
    public function getCatess()
    {
        //获取所有的分类
        $arr  = self::getAllCate();
        //通过父级id来获取子级元素
        $res =  self::getCatesByPidArr($arr,0);
        //返回数据
        return $res;
    }

    //递归分类
    public static function getCatesByPid($pid)
    {
        //读取数据库
        $res = DB::table('cates')->where('pid','=',$pid)->get();
        //遍历
        $data = [];
        foreach ($res as $key => $value) {
            $value['sub'] = self::getCatesByPid($value['id']);
            $data[] = $value;
        }
        return $data;
    }

    //获取分类下所有的分类 按照顺序来获取
    public static function getCates()
    {
        $res =  DB::table('cates')
                ->select(DB::raw('*,concat(path,",",id) as paths'))
                ->orderBy('paths')
                ->get();
                //调整分类名称   地区新闻 =====>  |------地区新闻
                foreach ($res as $key => $value) {
                    $tmp = explode(',',$value['path']);
                    $len = count($tmp)-1;
                    //修改分类的名称
                    $res[$key]['name'] =str_repeat('|----', $len).$value['name'];
                }
                return  $res;
        }
 
            //分类添加页面

    // public static function getCates()


    public function getAdd($id='')
    {
        //读取所有的分类信息 toArray方法可以把数据库查询结果变成数组形式
        $cates = self::getCates();
        // $cates = DB::table('cates')->orderBy('id', 'asc')->get();
        //显示一个form表单
        return view('cate.add',['cates'=>$cates,'id'=>$id]);
    }

    //分类的插入操作
    public function postInsert(Request $request)
    {
        $data = array();
        //获取父级分类id参数
        $pid = $request->input('pid');
        //判断
            $data = $request->except('_token');
        if($pid==0){//顶级分类
            $data['path'] = '0';
        }else{
            //获取父级分类的id
            $info = DB::table('cates')->where('id','=',$pid)->first();
            //拼接path路径
            $data['path'] = $info['path'].','.$info['id'];
        }

        $res = DB::table('cates')->insert($data);
        if($res){
            return  redirect('/admin/cate/index')->with('success','添加分类成功');
        }else{
            return  back()->with('error','添加分类失败');
        }
    }

    //分类的修改操作
    public function getEdit($id)
    {
        //读取当前id的分类信息
        $info=DB::table('cates')->where('id','=',$id)->first();
        return view('cate.edit',['cates'=>self::getCates(),'info'=>$info]);
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
            $info = DB::table('cates')->where('id','=',$pid)->first();
            //拼接path路径
            $data['path'] = $info['path'].','.$info['id'];
        }
        $res=DB::table('cates')->where('id','=',$request->input('id'))->update($data);
        if($res){
            return redirect('admin/cate/index')->with('success','修改成功');
        }else{
            return  back()->with('error','修改失败');
        }
    }

    //分类的删除操作
    public function getDelete($id)
    {
        //检测当前分类下是否有子分类
        $data = DB::table('cates')->where('pid','=',$id)->count();
        //判断
        if($data>0){
            return  back()->with('error','对不起有子分类的分类不允许删除');
        }
        //删除
        $res = DB::table('cates')->where('id','=',$id)->delete();
        if($res)
        {
            return  redirect('/admin/cate/index')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }

    //获取顶级分类
    public static function getTopCate()
    {
        return DB::table('cates')->where('pid',0)->get();
    }
}