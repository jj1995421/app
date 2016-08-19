<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //后台用户添加的页面  admin/user/add
    public function getAdd()
    {
        return view('user.add');
    }

    //声明添加方法
    public  function postInsert(Request $request)
    {
        //手动表单验证
        // if(!$request->input('username')){
        //     return back()->with('error','用户名不能为空');
        // }

        //laravel内置表单验证 
         $this->validate($request, [
            'username'=>'required|min:6',
            'password'=>'required',
            'repassword'=>'required|same:password',
            'email'=>'required|email'
            ],[
             'username.required'=>'用户名不能为空',
             'username.min'=>'用户名不能少于6位数',
             'password.required'=>'密码不能为空',
             'repassword.required'=>'确认密码不能为空',
             'repassword.same'=>'两次密码不一致',
             'email.required'=>'邮箱不能为空',
             'email.email'=>'邮箱格式不正确'
             ]);
         //拼接参数
        //$data['username'] = $request->insert('username');
        //$data['password'] = $request->insert('password');
        //$data['email'] = $request->insert('password');

         //提取部分参数
         $data = $request->only(['username','password','email']);
         $data['password'] = Hash::make($data['password']);   
         $data['token']  = str_random(50);  
         //执行数据的添加操作
         $res = DB::table('users')->insert($data);
         if($res){
            return redirect('admin/user/index')->with('success','添加成功');
         }else{
            return back()->with('error','添加失败');
         }
    }

    //用户列表首页
    public function getIndex(Request $request)
    {
        //读取数据并且分页
        // $users = DB::table('users')
        // ->paginate($request->input('num',10));
        // return view('user.index',['users'=>$users,'request'=>$request->all()]);

        $users = DB::table('users')
            ->where(    function($query) use ($request){
                    $query->where('username','like','%'.$request->input('keywords').'%');
            })
            ->paginate($request->input('num',10));
            //分配到模板执行显示
            return view('user.index',['users'=>$users,'request'=>$request->all()]);
    }

    // 用户修改
    function getEdit($id)
    {
        //获取参数
        $res = DB::table('users')->where('ID',$id)->first(); 

        return view('user.edit',['userInfo'=>$res]);
    }


    //用户的更新操作
    function postUpdate(Request $request)
    {
        //获取参数
        $data = $request->only('username','email');
        //开始更新
        $res = DB::table('users')->where('ID','=',$request->input('ID'))->update($data);
        //判断
        if($res){
            return redirect('admin/user/index')->with('success','更新成功');
        }else{
            return back()->with('error','更新失败');
        }
    }

    //用户删除
    function getDelete($id){
        $res = DB::table('users')->where('ID','=',$id)->delete();
        if($res)
        {
            return  redirect('/admin/user/index')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}






