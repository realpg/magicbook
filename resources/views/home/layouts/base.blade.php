<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    {{--<link rel="Bookmark" href="{{ URL::asset('img/favor.ico') }}">--}}
    {{--<link rel="Shortcut Icon" href="{{ URL::asset('img/favor.ico') }}"/>--}}
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{ URL::asset('dist/lib/html5shiv.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('dist/lib/respond.min.js') }}"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap/bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap/bootstrap-theme.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/iconfont/iconfont.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/common.css') }}"/>
    @section('seo')
        <title>魔法路书</title>
        <meta name="keywords" content="魔法路书" />
        <meta name="description" content="魔法路书" />
    @show
</head>
<body>
@section('header')
    <nav class="navbar navbar-default navbar-top margin-bottom-0">
        <div class="container padding-top-10 padding-bottom-10">
           <div class="float-left">
                <img src="{{URL::asset('img/logo_03.png')}}" class="width-60px height-60px" />
           </div>
            <div class="padding-top-10 float-left">
                <div class="font-size-15"><b>魔法路书</b></div>
                <div class="font-size-15"><b>让路书更智能</b></div>
            </div>
            <div class="padding-top-15" style="float:right;">
                <button type="button" class="btn btn-default margin-right-20 border-red font-color-red bg-none">登录</button>
                <button type="button" class="btn btn-danger bf-none bg-red border-red">注册</button>
            </div>
        </div>
    </nav>
@show
{{--<div class="height-80px"></div>--}}
@yield('content')
@section('footer')
    <footer class="bg-grey height-200px text-algin-center font-color-dark-grey padding-top-10 padding-bottom-10">
        <div class="container">
            <h3 class="margin-bottom-20 line-height-80">魔法路书-让路书更智慧</h3>
            <div>本站隶属于美景听听（北京）科技有限公司，&nbsp;京ICP备 15053860号 营业执照</div>
            <div>美景听听（北京）科技有限公司 注册地址：北京市石景山实兴大街30号院3号楼2层-1063房间</div>
        </div>
    </footer>
@show
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{ URL::asset('/js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap/bootstrap.js') }}"></script>
<!--/_footer 作为公共模版分离出去-->
{{--doT、md5、七牛等相关--}}
<script type="text/javascript" src="{{ URL::asset('/js/doT.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/js/md5.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/js/plupload/plupload.full.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/js/plupload/moxie.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('/js/jquery.form.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/js/jQueryProvinces/area.js') }}"></script>
{{--common.js--}}
{{--<script type="text/javascript" src="{{ URL::asset('/js/common.js') }}"></script>--}}
<script>
    $(function(){
        //初始化页面高度
        var winHeight=$(window).height();
        var headerHeight=$('nav').height();
        var footerHeight=$('footer').height();
        $('#main-body').css('min-height',winHeight-headerHeight-footerHeight)
    })
</script>

</body>
</html>

@yield('script')