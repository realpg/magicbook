<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="Bookmark" href="{{ URL::asset('img/favor.ico') }}">
    <link rel="Shortcut Icon" href="{{ URL::asset('img/favor.ico') }}"/>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{ URL::asset('dist/lib/html5shiv.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('dist/lib/respond.min.js') }}"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap/bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap/bootstrap-theme.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/iconfont/iconfont.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/common.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/right.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/layout.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/carousel.css') }}"/>
    <![endif]-->
    {{--@section('seo')
        <title>{{$common['base']['seo_title']}}</title>
        <meta name="keywords" content="{{$common['base']['seo_keywords']}}" />
        <meta name="description" content="{{$common['base']['seo_description']}}" />
    @show--}}
</head>
<body>
@section('header')
    <header class="navbar navbar-inverse style-home-nav-background" style="margin-bottom:0px;position:fixed;top:0px;left:0px;width:100%;z-index:2;">
        <div class="header container" style="display:none;">
            <div class="float-left header_logo">
                <a href="{{URL::asset('/index')}}"><img src="{{URL::asset('img/logo.png')}}" height="70" width="70" alt="logo图片" style="vertical-align:top;"></a>
            </div>
            <div class="float-left header_desc">
                <a href="{{URL::asset('/index')}}" style="display:inline-block;">
                    <p>魔法路书</p>
                    <p>让路书更智能</p>
                </a>
            </div>
            <div class="float-right header_right">
                <div class="float-left header_login">
                    <span>用户名 </span>
                    <input type="text" name="user" value="" placeholder="请输入手机号">
                </div>
                <div class="float-left header_login">
                    <span>密码 </span>
                    <input type="password" name="password" value="" placeholder="默认手机号后六位">
                </div>
                <div class="float-left header_button">
                    <button class="login_button move login_reg">登录</button>
                </div>
                <div class="float-left header_button">
                    <button class="reg_button move login_reg">注册</button>
                </div>
            </div>
        </div>
        <div class="header" style="display:block;">
            <div class="float-left header_logo">
                <a href="{{URL::asset('/index')}}"><img src="{{URL::asset('img/logo.png')}}" height="70" width="70" alt="logo图片" style="vertical-align:top;"></a>
            </div>
            <div class="float-left header_desc">
                <a href="{{URL::asset('/index')}}">
                    <p>魔法路书</p>
                    <p>让路书更智能</p>
                </a>
            </div>
            <div class="float-left header_daohang">
                <ul>
                    <li><a class="dh_change" href="{{URL::asset('/audition/scenery/')}}">获取试听</a></li>
                    <li><a class="dh_change" href="{{URL::asset('/info/tryListen/')}}">个人中心</a></li>
                </ul>
            </div>
            <div class="float-right header_layout">
                <span class="login_reg">退出</span>
            </div>
            <div class="float-right header_wel">
                <span>欢迎登录</span><span class="username">鲁智深</span>
            </div>
        </div>
    </header>
    <div style="width:100%;height:70px;"></div>
    {{--注册--}}
    <div id="mask" style="display:none;"></div>
    <div id="reg_window" class="reg_window" style="display:none;">
        <div class="reg_box container" style="padding:0px;">
            <div class="title">注册用户</div>
            <div class="note">
                <span>注：所有信息请如实填写，注册成功后
                登录名为手机号，密码为手机号后6位</span>
            </div>
            <div class="row info_table">
                <div class="bt col-xs-4 col-sm-4">您的姓名</div>
                <div class="con col-xs-8 col-sm-8">
                    <input type="text" name="" value="" placeholder="5个字以内">
                </div>
            </div>
            <div class="row info_table">
                <div class="bt col-xs-4 col-sm-4">您的手机</div>
                <div class="con col-xs-8 col-sm-8">
                    <input type="text" name="" value="" placeholder="请输入11位手机号">
                </div>
            </div>
            <div class="row info_table">
                <div class="bt col-xs-4 col-sm-4">公司名称</div>
                <div class="con col-xs-8 col-sm-8">
                    <input type="text" name="" value="" placeholder="请输入公司全称">
                </div>
            </div>
            <div class="row article">
                <div class="service col-xs-4 col-sm-4">
                    <span>业务类型(可多选)</span>
                </div>
                <div class="select col-xs-8 col-sm-8">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6">
                            <input type="checkbox" name="" value="">定制游
                        </div>
                        <div class="col-xs-6 col-sm-6">
                            <input type="checkbox" name="" value="">跟团游
                        </div>
                        <div class="col-xs-6 col-sm-6">
                            <input type="checkbox" name="" value="">自由行
                        </div>
                        <div class="col-xs-6 col-sm-6">
                            <input type="checkbox" name="" value="">其他
                        </div>
                    </div>
                </div>
            </div>
            <div class="row tk">
                <div class="col-xs-6 col-sm-6" style="padding:0px;">
                    <input type="checkbox" name="" value="">
                    <span style="margin-left:20px;">我已阅读并同意</span>
                </div>
                <div class="col-xs-6 col-sm-6" style="padding:0px;">
                    <a href="{{URL::asset('/service')}}" style="color:#FF3333;">《魔法天书服务条款》</a>
                </div>
            </div>
            <div class="row reg_button">
                <div class="col-xs-12 col-sm-12" style="padding:0px;">
                    <button id="reg">提交</button>
                </div>
            </div>
        </div>
        <div class="reg_close">
            <img src="{{URL::asset('img/close.png')}}" width="25" height="25" alt="">
        </div>
    </div>
    {{--注册成功--}}
    <div class="reg_success" style="display:none;">
        <div class="reg_box container" style="padding:0px;">
            <div class="title">注册成功</div>
            <div class="title">请在首页输入用户名密码登录</div>
            <div class="note">
                <span>请使用手机号作为用户名登录</span>
                <br/><span>密码为手机号后六位</span>
            </div>
        </div>
        <div class="success_close">
            <img src="{{URL::asset('img/close.png')}}" width="25" height="25" alt="">
        </div>
    </div>
    <style>
        .style_change{background:#E21C14;color:#fff;}
        .dh_style{background:#FF3333};
    </style>
@show
@yield('content')
@section('footer')
    <footer class="style-home-footer style_ft">
        <span>本站隶属于美景听听（北京）科技有限公司，&nbsp;京ICP备 15053860号 营业执照</span><br/>
        <span>美景听听（北京）科技有限公司 注册地址：北京市石景山实兴大街30号院3号楼2层-1063房间</span>
    </footer>
@show
<script type="text/javascript" src="{{ URL::asset('/js/jquery-1.8.3.min.js') }}"></script>
</body>
</html>
<script>
$(".reg_close").click(function(){
    $("#reg_window").css('display','none');
    $("#mask").css('display','none');
});
$(".success_close").click(function(){
    $(".reg_success").css('display','none');
    $("#mask").css('display','none');
});
$("#reg").click(function(){
    $(".reg_window").css('display','none');
    $(".reg_success").css('display','block');
});
$(".reg_button").click(function(){
    $("#reg_window").css('display','block');
    $("#mask").css('display','block');
});

$(document).ready(function(){

    $(".drift").hover(function() {
        $(this).css('background','#E21C14');
        $(this).css('color','#fff');
    }, function() {
        $(this).css('background','#fff');
        $(this).css('color','#E21C14');
    });
    $(".float").hover(function() {
        $(this).addClass('style_change');
    }, function() {
        $(this).removeClass('style_change');
    });
    $(".dh_change").hover(function() {
        $(this).addClass('dh_style');
    }, function() {
        $(this).removeClass('dh_style');
    });
    $(".login_reg").hover(function() {
        $(this).css('background','rgba(226, 28, 20, 1)');
        $(this).css('border','1px solid #fff');
        $(this).css('color','#fff');
    }, function() {
        $(this).css('background','#fff');
        $(this).css('border','1px solid rgba(226, 28, 20, 1)');
        $(this).css('color','#666');
    });
    $(".header_daohang a").each(function(){
        $this = $(this);
        if($this[0].href==String(window.location)){
            $(".header_daohang a").removeClass("active");
            $this.addClass("active");
        }
    });
});

</script>
@yield('script')