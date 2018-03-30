<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="Bookmark" href="{{ URL::asset('img/favicon.ico') }}">
    <link rel="Shortcut Icon" href="{{ URL::asset('img/favicon.ico') }}"/>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{ URL::asset('dist/lib/html5shiv.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('dist/lib/respond.min.js') }}"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/aui/aui.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/aui/aui-slide.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/iconfont/iconfont.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css') }}"/>
    <script type="text/javascript" src="{{ URL::asset('/js/jquery-3.3.1.min.js') }}"></script>
    @section('seo')
        <title>魔法路书</title>
        <meta name="keywords" content="魔法路书" />
        <meta name="description" content="魔法路书" />
    @show
</head>
<body>
@section('header')
    <header class="aui-bar aui-bar-nav aui-bar-light" style="background-color: #fff;">
        <a href="javascript:history.back(-1);" class="aui-pull-left aui-btn style-back">
            <span class="aui-iconfont aui-icon-left style-font-bold"></span>
        </a>
        <div class="aui-title style-text-17" style="color:#030303;">意大利语音讲解</div>
    </header>
@show
{{--<div style="height:2.6rem;"></div>--}}
@yield('content')
<div style="height:2.6rem;"></div>
@section('footer')
    <footer id="footer">
        <div class="footer-row-1">
            <img src="{{URL::asset('img/qrcode.png')}}" class="style-margin-center" />
        </div>
        <div class="aui-font-size-12 footer-row-2">
            <div class="footer-row-2-box-1">点击前往下载</div>
            <div class="footer-row-2-box-2">美景听听APP</div>
        </div>
        <div class="footer-row-3">
            <img src="{{URL::asset('img/footer_player.png')}}" />
        </div>
        <div class="footer-row-4">
           <img src="{{URL::asset('img/footer_image.png')}}" />
        </div>
    </footer>
@show
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{ URL::asset('js/aui/api.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('dist/lib/layer/2.4/layer.js') }}"></script>
<!--/_footer 作为公共模版分离出去-->
{{--doT、md5、七牛等相关--}}
<script type="text/javascript" src="{{ URL::asset('/js/doT.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/js/md5.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/js/qiniu.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/js/plupload/plupload.full.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/js/plupload/moxie.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('/js/jquery.form.js') }}"></script>
{{--common.js--}}
<script type="text/javascript" src="{{ URL::asset('/js/common.js') }}"></script>
<script>
    $(function(){

    })
</script>

</body>
</html>

@yield('script')