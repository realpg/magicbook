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
        <title>魔法行程单</title>
        <meta name="keywords" content="魔法行程单" />
        <meta name="description" content="魔法行程单" />
    @show
    <style>
        img { pointer-events: all; }
    </style>
</head>
<body>
@section('header')
    {{--<header class="aui-bar aui-bar-nav aui-bar-light" style="background-color: #fff;">--}}
        {{--<a href="javascript:history.back(-1);" class="aui-pull-left aui-btn style-back">--}}
            {{--<span class="aui-iconfont aui-icon-left style-font-bold"></span>--}}
        {{--</a>--}}
        {{--<div class="aui-title style-text-17" id="header-title" style="color:#030303;"></div>--}}
    {{--</header>--}}
@show
{{--<div style="height:2.6rem;"></div>--}}
@yield('content')
<div style="height:2.6rem;"></div>
@section('footer')
    @if($logo&&$slogan)
    <footer id="footer">
        <div class="footer-row-1">
            <a href="javascript:" >
                <img src="{{$logo}}" class="style-margin-center" />
            </a>
        </div>
        <a href="{{$url}}app/download?code={{$code}}">
            <div class="aui-font-size-16 footer-row-2 style-display-table">
                <div class="footer-row-2-text style-vertical-align-middle style-display-table-cell">
                    <div class="aui-ellipsis-2">
                        <b>{{$slogan}}</b>
                    </div>
                </div>
            </div>
        </a>
        <div class="footer-row-4">
            <img src="{{URL::asset('img/footer_image.png')}}" />
        </div>
    </footer>
    @else
        <footer id="footer">
            <div class="footer-row-1">
                <a href="javascript:" onclick="ejectQrcode()" >
                    <img src="{{URL::asset('img/erweima_03.png')}}" class="style-margin-center" />
                </a>
            </div>
            <a href="{{$url}}app/download?code={{$code}}">
                <div class="aui-font-size-12 footer-row-2 style-display-table">
                    <div class="footer-row-2-text style-vertical-align-middle style-display-table-cell">
                        <div class="aui-ellipsis-2">
                            此处还有很多景点讲解,下载美景听听App,可以了解更多哦
                        </div>
                    </div>
                </div>
            </a>
            <div class="footer-row-4">
                <img src="{{URL::asset('img/footer_image.png')}}" />
            </div>
        </footer>
    @endif
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

<script type="text/javascript" src="{{ URL::asset('/js/jquery.qrcode.min.js') }}"></script>
{{--common.js--}}
<script type="text/javascript" src="{{ URL::asset('/js/common.js') }}"></script>
<script>
    $(function(){
        if (navigator.userAgent.match(/(iPhone|iPod|iPad);?/i)) {
            if(screen.height == 812 && screen.width == 375){
                $('footer').css('height','60')
            }
        }
    })
    function ejectQrcode(){
        pop({
            width:200,//提示窗口的宽度
            height:230,//提示窗口的高度
        });
        $('#qrcode_img').attr('{{URL::asset('img/footer_image.png')}}')
    }
    function pop(obj){function tanchuang(obj){$('body').append('<div id="mry-opo"><div  id="mry-opo-content" ><img src="{{URL::asset('img/erweima_03.png')}}" id="qrcode_img" style="width:100%;" /><p class="aui-font-size-16">扫描二维码</p><p>关注美景听听公众号</p></div></div>');var div = $('#mry-opo');$('#mry-opo-content').text(obj.content);div.css('width',obj.width+'px');div.css('height',obj.height+'px');div.css('margin-left',-(parseInt(obj.width)/2)+'px');div.css('margin-top',-(parseInt(obj.height)/2)+'px');div.css('background',obj.backgorund);$('#mry-mask').css('display','block');}function del(){$('#mry-opo').append('<a href="javascript:void(0)" deletes="mry-opo" style="position:absolute;right:10px;top:6px;color:#fff;font-size:12px;">X</a>');	$('[deletes=mry-opo]').click(function(){$('#mry-opo,#mry-mask').remove();});}$('body').append('<div id="mry-mask" deletes="mry-opo"></div>');var ject=obj;ject.width = parseInt(obj.width)||300;ject.height = parseInt(obj.height)||300;ject.backgorund=obj.backgorund||'#fff';tanchuang(ject);del();}

</script>

</body>
</html>

@yield('script')