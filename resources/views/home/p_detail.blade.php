<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{{config('app.webname')}} - {{$arcs['title']}}</title>
<link rel="stylesheet" type="text/css" href="/home/css/reset.css" />
<link href="/home/css/bootstrap.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/home/css/index.css" />
<link rel="stylesheet" type="text/css" href="/home/css/main.css" />
<script type="text/javascript" src="/home/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/home/js/jquery.SuperSlide.js"></script>
<!--分页-->
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/jquery.twbsPagination.js" type="text/javascript"></script>
<script src="js/zzsc.js" type="text/javascript"></script>
</head>

<body>
<!--头部-->
<div class="top">
	<img src="/home/images/top.jpg" />
</div>
<!--头部 end-->
<!--导航部分-->
<div class="nav">
	<ul>
        <li><a href="{{url('/index')}}" >首页</a></li>
        <li><a href="{{url('/news_list')}}" >新闻动态</a></li>
        <li><a href="{{url('/profile')}}" >公司概况</a></li>
        <li><a href="{{url('/business')}}">业务介绍</a></li>
        <li><a href="{{url('/tz_list')}}" >通知公告</a></li>
        <li><a href="{{url('/service')}}" >用户服务</a></li>
        <li><a href="{{url('/culture')}}" >企业文化</a></li>
        <li><a href="{{url('/dq_list')}}">党群窗口</a></li>
        <li><a href="{{url('/zc_list')}}" >政策法规</a></li>
    </ul>
</div>
<!--导航部分 end-->
<!--主体部分-->
<div class="news_wrapper">
	<div class="wrapper_box">
    <!--左侧-->
    	<div class="wrapper_boxleft">
        	<ul class="news_menu">
            <!-- 遍历分类 -->
        <li><a href="{{url('/news_list')}}" >新闻动态</a></li>
        <li><a href="" target="_blank">公司概况</a></li>
        <li><a href="{{url('/business')}}" target="_blank">业务介绍</a></li>
        <li><a href="" target="_blank">通知公告</a></li>
        <li><a href="" target="_blank">用户服务</a></li>
        <li><a href="" target="_blank">企业文化</a></li>
        <li><a href="" target="_blank">党群窗口</a></li>
        <li><a href="" target="_blank">政策法规</a></li>
            </ul>
            <!--新闻动态-->
            <div class="news_box">
            	<p class="title">新闻动态</p>
                <ul>
                @foreach($arcse as $k=>$v)
                	<li><a href="{{url('p_detail-'.$v['id'])}}" target="_blank">{{$v['title']}}</a></li>
                @endforeach
                </ul>
            </div>
            <div class="news_r_box" style="border-bottom:none;">
                    <img src="/home/images/newsr1.jpg" />
                </div>
                <div class="news_r_box">
                    <img src="/home/images/newsr2.jpg" />
                </div>
        </div>
        <!--右侧列表-->
        <div class="wrapper_boxrig">
        	<p class="tit"><a href="" target="_blank">首页</a> 》 <a href="" target="_blank">新闻动态</a> 》 <a href="" target="_blank">招标公告</a></p>
        	<div class="p_content">
            	<p class="title">{{$arcs['title']}}</p>
                <div class="xin_ti"><span>点击数:</span><span>时间：{{$arcs['created_at']}}</span><span>来源:南昌广电</span></div>
                <div class="content_detail">
                	{!!$arcs['content']!!}
                    <img src="{{$arcs['pic']}}" />
                </div>
                <div class="other_new">
                    @if($ar['pre'])
                    <p><a href="{{url('p_detail-'.$ar['pre']['id'])}}">上一条：{{$ar['pre']['title']}}</a></p>
                    @else
                        <p><span>没有上一条了</span></p>
                    @endif

                    @if($ar['next'])
                    <p><a href="{{url('p_detail-'.$ar['next']['id'])}}">下一条：{{$ar['next']['title']}}</a></p>
                    @else
                       <p><span>没有下一条了</span></p> 
                    @endif
                </div>
            </div>       
           
        </div>
	</div>
</div>
<!--底部-->
<div class="footer"> 
	<p style="margin-left:250px"><span style="margin-right:35px;">赣ICP备10200922号</span><span style="margin-right:35px;"> 版权所有：南昌广电网络 </span><span> 制作维护：南昌广电全媒体科技有限公司</span></p>
    <p style="margin-left:250px"><span style="margin-right:52px;">客服热线：95130</span> <span>通讯地址：江西省南昌市红谷滩新区绿茵路1号南昌广电大楼</span></p>
</div>
</div>
<div class="footer_line"></div>
</body>
</html>
