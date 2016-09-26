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
	<div class="buesiness_bar"> <img src="/home/images/business_banner.jpg" width="100%"/></div>
	<div class="wrapper_box wrap_boxs">
        <div class="menu_left">
        	<ul id="nav">
                <li><a class="selected" >广播类业务</a>
                     <ul>
                     <li><a class="selected" >高清频道</a>
                         <ul>
                             <li><a href="board_gao.html">业务介绍</a></li>
                             <li><a href="board_gao_use.html">使用指南</a></li>
                             <li><a href="board_gao_offer.html">业务办理</a></li>
                         </ul>
                     </li>
                     <li><a class="selected" >标清专业付费频道</a>
                         <ul>
                             <li><a href="board_fu.html">业务介绍</a></li>
                             <!--<li><a href="#">使用指南</a></li>
                             <li><a href="#">业务办理</a></li>-->
                         </ul>
                     </li>
                     <li><a class="selected" >轮播影院</a>
                         <ul>
                             <li><a href="board_lun.html">业务介绍</a></li>
                             <li><a href="board_lun_ues.html">使用指南</a></li>
                            <!-- <li><a href="#">业务办理</a></li>-->
                         </ul>
                     </li>
                     </ul>
                </li>
            </ul>
        </div>
        <!--右侧列表-->
        <div class="wrapper_boxrig" style="margin-left:1%;">
        	<p class="tit"><a href="" target="_blank">首页</a> 》 <a href="" target="_blank">{{$arcs['pid']}}</a> 》 <a href="" target="_blank">{{$arcs['yname']}}</a></p>
        	<div class="business_cont">
            <p class="title">{{$arcs['title']}}</p>
            <img src="/home/images/line.jpg" width="100%"/>
            	{!!$arcs['content']!!}
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
