<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>南昌广电网络</title>
<link rel="stylesheet" type="text/css" href="/home/css/reset.css" />
<link href="/home/css/bootstrap.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/home/css/index.css" />
<link rel="stylesheet" type="text/css" href="/home/css/main.css" />
<script type="text/javascript" src="/home/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/home/js/jquery.SuperSlide.js"></script>
<!--分页-->
<script src="/home/js/bootstrap.js" type="text/javascript"></script>
<script src="/home/js/jquery.twbsPagination.js" type="text/javascript"></script>
<script src="/home/js/zzsc.js" type="text/javascript"></script>
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
        <li><a href="{{url('/business')}}" target="_blank">业务介绍</a></li>
        <li><a href="{{url('/tz_list')}}" >通知公告</a></li>
        <li><a href="" target="_blank">用户服务</a></li>
        <li><a href="" target="_blank">企业文化</a></li>
        <li><a href="{{url('/dq_list')}}">党群窗口</a></li>
        <li><a href="{{url('/zc_list')}}">政策法规</a></li>
    </ul>
</div>
<!--导航部分 end-->
<!--主体部分-->
<div class="news_wrapper">
	<div class="wrapper_box">
    <!--左侧-->
    	<div class="wrapper_boxleft">
        	<ul class="news_menu">
        <li><a href="{{url('/news_list')}}" >新闻动态</a></li>
        <li><a href="{{url('/profile')}}" >公司概况</a></li>
        <li><a href="{{url('/business')}}" target="_blank">业务介绍</a></li>
        <li><a href="{{url('/tz_list')}}" >通知公告</a></li>
        <li><a href="" target="_blank">用户服务</a></li>
        <li><a href="" target="_blank">企业文化</a></li>
        <li><a href="{{url('/dq_list')}}">党群窗口</a></li>
        <li><a href="{{url('/zc_list')}}">政策法规</a></li>
            </ul>
            <!--新闻动态-->
            <div class="news_box">
            	<p class="title">新闻动态</p>
                <ul>
                	<li><a href="" target="_blank">湖南有线集团获得央视3568频道</a></li>
                    <li><a href="" target="_blank">湖南有线集团获得央视3568频道</a></li>
                    <li><a href="" target="_blank">湖南有线集团获得央视3568频道</a></li>
                    <li><a href="" target="_blank">湖南有线集团获得央视3568频道</a></li>
                    <li><a href="" target="_blank">湖南有线集团获得央视3568频道</a></li>
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
        	<p class="tit"><a href="{{url('index')}}" target="_blank">首页</a> 》 <a href="" target="_blank">政策法规</a> 》 动态列表</a></p>
            <p class="title_me">新闻动态</p>
        	<ul class="news_list">
            @foreach($arcs as $k=>$v)
                <li>
                	<img src="/home/images/arrow.png" />
                    <div class="senten"><a href="{{url('p_detail-'.$v['id'])}}" target="_blank">{{$v['title']}}</a></div>
                    <div class="time">{{$v['created_at']}}</div>
                </li>
                @endforeach
            </ul>
            <!--分页-->
           <div id="content-wrapper">
            <div class="inner clearfix">
                <section id="main-content">
                    <div class="text-center">
                     {!!$arcs->render()!!}
                    </div>
                </section>
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
