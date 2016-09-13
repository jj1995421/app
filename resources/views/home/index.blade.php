<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>南昌广电网络</title>
<link rel="stylesheet" type="text/css" href="/home/css/reset.css" />
<link rel="stylesheet" type="text/css" href="/home/css/index.css" />
<script type="text/javascript" src="/home/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/home/js/jquery.SuperSlide.js"></script>
</head>

<body>
<!--头部-->
<div class="top">
    <img src="/home/images/top.jpg" />
</div>
<!--头部 end-->
<img src="/home/images/banner.jpg" width="100%"/>
<!--导航部分-->
<div class="nav">
    <ul>
        <li><a href="{{url('/index')}}" >首页</a></li>
        <li><a href="{{url('/news_list')}}" >新闻动态</a></li>
        <li><a href="" target="_blank">公司概况</a></li>
        <li><a href="{{url('/business')}}" target="_blank">业务介绍</a></li>
        <li><a href="" target="_blank">通知公告</a></li>
        <li><a href="" target="_blank">用户服务</a></li>
        <li><a href="" target="_blank">企业文化</a></li>
        <li><a href="" target="_blank">党群窗口</a></li>
        <li><a href="" target="_blank">政策法规</a></li>
    </ul>
</div>
<!--导航部分 end-->
<!--主体部分-->
<div class="wrapper">
    <div class="news_l">
        <div class="news_ad_l">
        <!--焦点图-->
            <div class="focusBox" >
                <ul class="pic" style="position: relative; width: 320px; height: 240px;">
                <li style="position: absolute; width: 320px; left: 0px; top: 0px; display: none;"><a href="http://sc.chinaz.com/" target="_blank"><img src="/home/images/banner1.jpg"></a></li>
                <li style="position: absolute; width: 320px; left: 0px; top: 0px; display: none;"><a href="http://sc.chinaz.com/" target="_blank"><img src="/home/images/2.jpg"></a></li>
                <li style="position: absolute; width: 320px; left: 0px; top: 0px; display: list-item;"><a href="http://sc.chinaz.com/" target="_blank"><img src="/home/images/3.jpg"></a></li>
                <li style="position: absolute; width: 320px; left: 0px; top: 0px; display: none;"><a href="http://sc.chinaz.com/" target="_blank"><img src="/home/images/4.jpg"></a></li>
                </ul>
                <div class="txt-bg"></div>
                <div class="txt">
                <ul>
                <li style="bottom: -36px;"><a href="http://sc.chinaz.com/">1Quiet</a></li>
                <li style="bottom: -36px;"><a href="http://sc.chinaz.com/">2DoubleLi</a></li>
                <li style="bottom: 0px;"><a href="http://sc.chinaz.com/">3Quiet</a></li>
                <li style="bottom: -36px;"><a href="http://sc.chinaz.com/">4Quiet</a></li>
                </ul></div>
                <ul class="num">
                <li class=" "><a>1</a><span></span></li>
                <li class=" "><a>2</a><span></span></li>
                <li class="  on"><a>3</a><span></span></li>
                <li class=" "><a>4</a><span></span></li>
                </ul>
                </div>
                <script type="text/javascript">
                jQuery(".focusBox").slide({ titCell:".num li", mainCell:".pic",effect:"fold", autoPlay:true,trigger:"click",startFun:function(i){jQuery(".focusBox .txt li").eq(i).animate({"bottom":0}).siblings().animate({"bottom":-36});}});
                </script>
                <!--焦点图 end-->
               <div class="focus_ad">
                <img src="/home/images/ad1.jpg" />
               </div>
        </div>
        <!--第一层右侧新闻部分-->
        <div class="news_ad_r">
            <!--头条新闻-->
            <a href="" target="_blank">
            <div class="topnews">
                <p class="topnews_title">女子20公里竞走刘虹终点前反超夺金 墨西哥银牌</p>
                <div class="topnews_cont">北京时间8月20日，2016年里约奥运会的田径比赛，继续在第14个比赛日进行。女子20公里竞走决赛，参赛的3名中国选手发挥出色，刘虹以1小时28分35秒的成绩获得冠军，吕秀芝以1小时28分42秒获得季军，切阳什姐以1小时29分04秒排名第五</div>
            </div>
            </a>
            <!--新闻动态-->
            <div class="dailynews">
                <div class="news_more">
                新闻动态
                </div>
                <ul>

                @foreach($sqq as $k=>$v)
                <!-- @if($v['cate_id']==1) -->
                    <a href="{{url('p_detail-'.$v['id'])}}" target="_blank"><li>{{$v['title']}}</li></a>
                <!-- @endif -->
                @endforeach
                </ul>
            </div>
            <!--新闻动态 end-->
        </div>
        <!--第二层新闻-->
        <!--党群窗口-->
            <div class="dailynews2">
                <div class="news_more">
                党群窗口
                </div>
                <ul>
                @foreach($sqq2 as $k=>$v)
                    <a href="{{url('p_detail-'.$v['id'])}}" target="_blank"><li>{{$v['title']}}</li></a>
                @endforeach
                </ul>
            </div>
            <!--党群窗口 end-->
            <!--政策法规-->
            <div class="dailynews">
                <div class="news_more">
                政策法规
                </div>
                <ul>
                @foreach($sqq3 as $k=>$v)
                    <a href="{{url('p_detail-'.$v['id'])}}" target="_blank"><li>{{$v['title']}}</li></a>
                @endforeach
                </ul>
            </div>
            <!--政策法规 end-->
    </div>
    <div class="news_r">
        <!--通知公告-->
        <div class="annouce">
            <p class="annouce_title">通知公告</p>
            <ul>
                @foreach($sqqq as $k=>$v)
                    <a href="{{url('p_detail-'.$v['id'])}}" target="_blank"><li>{{$v['title']}}</li></a>
                @endforeach
            </ul>
        </div>
        <!--通知公告 end-->
        <div class="news_r_box" >
            <img src="/home/images/newsr1.jpg" />
        </div>
        <div class="news_r_box">
            <img src="/home/images/newsr2.jpg" />
        </div>
    </div>
    <!--广告部分-->
    <div class="ad">
    <img src="/home/images/ad_1.jpg" />
    </div>
    <!--广告类业务-->
    <div class="ad_service">
        <div class="service_box">
        广告类业务
        </div>
        <ul id="ad_service">
            <li>
                <img src="/home/images/ad_service1.jpg" />
                <div class="ad_service_cont">
                    <p><span class="title" style="color:#5FD5D2">标清付费频道</span><span class="e_title">Standard pay channel</span></p>
                    <p><a href="" target="_blank"><span class="ad_service_com">业务介绍&nbsp;》</span></a><a href="" target="_blank"><span class="ad_service_com">业务办理&nbsp;》</span></a></p>
                </div>
            </li>
            <li>
                <img src="/home/images/ad_service2.jpg" />
                <div class="ad_service_cont">
                    <p><span class="title" style="color:#BA0843">高清频道</span><span class="e_title">HD Channel</span></p>
                    <p><a href="" target="_blank"><span class="ad_service_com">业务介绍&nbsp;》</span></a><a href="" target="_blank"><span class="ad_service_com">业务办理&nbsp;》</span></a></p>
                </div>
            </li>
            <li>
                <img src="/home/images/ad_service3.jpg" />
                <div class="ad_service_cont">
                    <p><span class="title" style="color:#DEAC35">轮播影院</span><span class="e_title">Home Theater</span></p>
                    <p><a href="" target="_blank"><span class="ad_service_com">业务介绍&nbsp;》</span></a><a href="" target="_blank"><span class="ad_service_com">业务办理&nbsp;》</span></a></p>
                </div>
            </li>
        </ul>
    </div>
    <!--广告类业务 end-->
    <!--宽带业务、芯片快递层-->
    <div class="layertwo">
        <!--左侧-->
        <div class="layertwo_l">
            <!--宽带业务-->
            <div class="service_box" style="margin-top:10px;">
                宽带业务
            </div>
            <ul id="broadband">
                <li>
                    <img src="/home/images/kuan1.jpg" />
                    <p class="title">宽带业务</p>
                    <p class="cont">      采用光纤到楼栋配合同轴电缆/网线入户的100M接入和直接1000M光纤入户的方式，为用户提供高速、稳定的宽带网接入和各项家庭互联网信息服务。</p>
                </li>
                <li>
                    <img src="/home/images/kuan2.jpg" />
                    <p class="title">集团专网宽带</p>
                    <p class="cont"> 南昌广电网络采用MPLS技术，在公共IP网络上构建企业专网。</p>
                </li>
            </ul>
            <!--宽带业务-->
            <!--广告类业务-->
            <div class="service_box">
                点播类业务
            </div>
            <ul id="broadband">
                <li>
                    <img src="/home/images/board1.jpg" />
                    <p class="title">电视回看</p>
                    <p class="cont">    30余套电视频道，7天内可回看，不受时段束缚,不怕错过镜头，亦可重温喜爱。回看含暂停、快进快退、定位停止等功能。</p>
                </li>
                <li>
                    <img src="/home/images/board2.jpg" />
                    <p class="title">影视点播</p>
                    <p class="cont">        50万小时影视综艺内容，每日更新。大片、热剧、探索、BBC纪实、顶级赛事、迪斯尼动漫，满足全家视听。</p>
                </li>
            </ul>
            <!--广告类业务 end-->
        </div>
        <!--左侧 end-->
        <!--右侧-->
        <div class="layertwo_r">
            <p class="title"><span>新片快递</span><span style="float:right;font-size: 10px;">MORE</span></p>
            <ul class="movie">
                <li>
                    <div>
                        <img src="/home/images/movie1.jpg" /><div class="title">卧底</div>
                        <div class="profile">
                        <span style="font-weight:bold;">剧情介绍:</span> 
                        1937年至1945年抗战最艰难的时期，我当地下情工人员秦川在组织的秘密策划下，成功打入
                        </div>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="/home/images/movie2.jpg" /><div class="title">伪装者</div>
                        <div class="profile">
                        <span style="font-weight:bold;">剧情介绍:</span> 
                        1937年至1945年抗战最艰难的时期，我当地下情工人员秦川在组织的秘密策划下，成功打入
                        </div>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="/home/images/movie3.jpg" /><div class="title">毕业歌</div>
                        <div class="profile">
                        <span style="font-weight:bold;">剧情介绍:</span> 
                        1937年至1945年抗战最艰难的时期，我当地下情工人员秦川在组织的秘密策划下，成功打入
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!--右侧 end-->
    </div>
    <!--宽带业务、芯片快递层 end--
    <!--广告-->
    <div class="ad1">
        <a href="" target="_blank"><img src="/home/images/ad.jpg" /></a>
    </div>
    <!--第三层 用户服务-->
    <div class="layer_thr">
        <!--用户服务-->
        <div class="service">
            <img src="/home/images/userservice.png" style="  margin-top: 10px;"/>
            <ul>
                <li><a href="" target="_blank">业务办理</a></li>
                <li><a href="" target="_blank">简易排障</a></li>
                <li><a href="" target="_blank">热点答疑</a></li>
                <li><a href="" target="_blank">缴费方式</a></li>
            </ul>
        </div>
        <!--营业厅-->
        <div class="map">
        <p class="tit"><span>孺子路</span><span>南京东路</span><span>解放西路</span><span>三店西路</span><span>环湖路</span><span>丰和中大道</span><span>下罗</span><span>丽景路</span><span style="float:right;font-size: 13px;">MORE</span></p>
            <div class="yingye">
            <img src="/home/images/yingye.jpg" />
            </div>
            <div class="maps">
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="百度地图,百度地图API，百度地图自定义工具，百度地图所见即所得工具" />
<meta name="description" content="百度地图API自定义地图，帮助用户在可视化操作下生成百度地图" />
<title>百度地图API自定义地图</title>
<!--引用百度地图API-->
<style type="text/css">
    html,body{margin:0;padding:0;}
    .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
    .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
</style>
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
</head>

<body>
  <!--百度地图容器-->
  <div style="width:585px;height:243px;border:#ccc solid 1px;" id="dituContent"></div>
</body>
<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
        addMarker();//向地图中添加marker
    }
    
    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = new BMap.Point(115.958738,28.677622);//定义一个中心点坐标
        map.centerAndZoom(point,12);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }
    
    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }
    
    //地图控件添加函数：
    function addMapControl(){
        //向地图中添加缩放控件
    var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
    map.addControl(ctrl_nav);
        //向地图中添加缩略图控件
    var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
    map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
    var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
    map.addControl(ctrl_sca);
    }
    
    //标注点数组
    var markerArr = [{title:"南昌有线电视营业厅",content:"孺子路329号",point:"115.897339|28.677828",isOpen:0,icon:{w:23,h:25,l:46,t:21,x:9,lb:12}}
         ,{title:"南昌有线电视营业厅",content:"南昌市青云谱区",point:"115.914865|28.636512",isOpen:0,icon:{w:23,h:25,l:46,t:21,x:9,lb:12}}
         ,{title:"南昌有线电视营业厅",content:"青山湖区南京东路697号",point:"115.953617|28.687992",isOpen:0,icon:{w:23,h:25,l:46,t:21,x:9,lb:12}}
         ,{title:"南昌有线电视营业厅",content:"红谷滩新区丰和中大道1873号",point:"115.874944|28.702733",isOpen:0,icon:{w:23,h:25,l:46,t:21,x:9,lb:12}}
         ,{title:"南昌有线电视下罗营业厅",content:"红谷滩新区庐山南大道2789号（近枫林东大街）",point:"115.857229|28.741489",isOpen:0,icon:{w:23,h:25,l:46,t:21,x:9,lb:12}}
         ,{title:"南昌有线电视营业厅",content:"环湖路39号附近",point:"115.902414|28.688681",isOpen:0,icon:{w:23,h:25,l:46,t:21,x:9,lb:12}}
         ,{title:"南昌有线电视营业厅",content:"解放西路81号凯德广场2楼",point:"115.928204|28.660603",isOpen:0,icon:{w:23,h:25,l:46,t:21,x:9,lb:12}}
         ];
    //创建marker
    function addMarker(){
        for(var i=0;i<markerArr.length;i++){
            var json = markerArr[i];
            var p0 = json.point.split("|")[0];
            var p1 = json.point.split("|")[1];
            var point = new BMap.Point(p0,p1);
            var iconImg = createIcon(json.icon);
            var marker = new BMap.Marker(point,{icon:iconImg});
            var iw = createInfoWindow(i);
            var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
            marker.setLabel(label);
            map.addOverlay(marker);
            label.setStyle({
                        borderColor:"#808080",
                        color:"#333",
                        cursor:"pointer"
            });
            
            (function(){
                var index = i;
                var _iw = createInfoWindow(i);
                var _marker = marker;
                _marker.addEventListener("click",function(){
                    this.openInfoWindow(_iw);
                });
                _iw.addEventListener("open",function(){
                    _marker.getLabel().hide();
                })
                _iw.addEventListener("close",function(){
                    _marker.getLabel().show();
                })
                label.addEventListener("click",function(){
                    _marker.openInfoWindow(_iw);
                })
                if(!!json.isOpen){
                    label.hide();
                    _marker.openInfoWindow(_iw);
                }
            })()
        }
    }
    //创建InfoWindow
    function createInfoWindow(i){
        var json = markerArr[i];
        var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
        return iw;
    }
    //创建一个Icon
    function createIcon(json){
        var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
        return icon;
    }
    
    initMap();//创建和初始化地图
</script>
</html>
            </div>
        </div>
</div>
</div>
<!--主体部分 end-->
<!--底部-->
<div class="footer">
    <p style="margin-left:250px"><span style="margin-right:35px;">赣ICP备10200922号</span><span style="margin-right:35px;"> 版权所有：南昌广电网络 </span><span> 制作维护：南昌广电全媒体科技有限公司</span></p>
    <p style="margin-left:250px"><span style="margin-right:52px;">客服热线：95130</span> <span>通讯地址：江西省南昌市红谷滩新区绿茵路1号南昌广电大楼</span></p>
</div>

<div class="footer_line"></div>
</body>
</html>
