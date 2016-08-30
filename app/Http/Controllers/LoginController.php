<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
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
            echo 1;die;
        }else{
            echo 0;
        }
    }
}