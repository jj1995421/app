<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    
    //后台首页
    public function index()
    {
        //解析模板
        return view('admin.index');
    }

   
}
