<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use Crypt;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    //后台登录页面显示
    public function login()
    {
        return view('admin.login');
    }



    //用户的登陆操作
    public function dologin(LoginRequest $request)
    {
        //获取用户信息
        $user = DB::table('users')
        ->where('username',$request->input('username'))
        ->first();
        //检测密码是否一致
        if(Hash::check($request->input('password'),$user['password'])){
            //让用户登陆
            session(['id'=>$user['ID']]);
            //记住我  的操作
            if($request->input('remem')){
                $str = 'admin|admin';
                //加密
                $auth_user = Crypt::encrypt($str);
                //写入cookie
                \Cookie::queue('auth_user',$auth_user,60*24*7);

            }
            return redirect('/admin')->with('success','登陆成功');
        }else{
            return back()->with('error','登录失败');
        }
    }
}