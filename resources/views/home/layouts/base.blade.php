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
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap/bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap/bootstrapValidator.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap/bootstrap-theme.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/iconfont/iconfont.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/loading/jquery.mloading.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/common.css') }}"/>
    <script type="text/javascript" src="{{ URL::asset('/js/jquery-3.3.1.min.js') }}"></script>
    @section('seo')
        <title>魔法行程单</title>
        <meta name="keywords" content="魔法行程单" />
        <meta name="description" content="魔法行程单" />
    @show
</head>
<body>
@section('header')
    @if($menu=='center')
        <nav class="navbar navbar-default navbar-fixed-top margin-bottom-0 border-radius-0 border-0" style="box-shadow: none;">
    @else
        <nav class="navbar navbar-default navbar-fixed-top margin-bottom-0 border-radius-0 border-0">
    @endif
        <div class="container">
           <div class="float-left padding-top-10 padding-left-10 width-80px height-80px" style="background-color: #E21C14;">
               <a href="{{URL::asset('/')}}">
                   <img src="{{URL::asset('img/logo.png')}}" class="width-60px height-60px" />
               </a>
           </div>
            <div class="float-left margin-top-10 margin-bottom-10 padding-left-10">
                <a href="{{URL::asset('/')}}" style="color:#000;text-decoration: none;">
                    <div class="font-size-15 margin-top-10"><b>魔法行程单</b></div>
                    <div class="font-size-15"><b>让路书更智能</b></div>
                </a>
            </div>
            @if($common['user'])
            <div class="row float-left text-center height-80px line-height-80 index-menu" style="width:300px;margin-left:7%;">
                <a href="{{URL::asset('audition')}}">
                    <div class="col-xs-6 col-sm-6 font-size-16 {{$menu=='audition'?'nav-active':''}}">获取音频</div>
                </a>
                <a href="{{URL::asset('center')}}">
                    <div class="col-xs-6 col-sm-6 font-size-16 {{$menu=='center'?'nav-active':''}}">个人中心</div>
                </a>
            </div>
            @endif
            <div class="padding-top-15 float-right margin-top-10 margin-bottom-10">
                @if($common['user'])
                    <div class="float-left margin-right-20 line-height-30 font-weight" style="margin-top:-3px;">
                        <img src="{{URL::asset('img/logo.png')}}" class="img-rect-40 border-radius-100 margin-right-10" />
                        {{$common['user']['username']}}
                    </div>
                    <a href="{{URL::asset('/sign/out')}}">
                        <button type="button" class="btn btn-default margin-right-20 border-red font-color-red bg-none padding-left-20 padding-right-20" style="border-radius: 0;background: #fff;">退出</button>
                    </a>
                @else
                    <a href="{{URL::asset('/sign/in')}}">
                        <button type="button" class="btn btn-default margin-right-20 border-red font-color-red bg-none padding-left-20 padding-right-20" style="border-radius: 0;background: #fff;">登录</button>
                    </a>
                    <a href="{{URL::asset('/sign/up')}}">
                        <button type="button" class="btn btn-danger bf-none bg-red border-red padding-left-20 padding-right-20" style="border-radius: 0;">注册</button>
                    </a>
                @endif
            </div>
        </div>
    </nav>
@show
<div class="height-80px"></div>
@yield('content')
@section('footer')
    <footer class="bg-grey height-200px text-algin-center font-color-dark-grey padding-top-10 padding-bottom-10" style="background-color:#393939;min-height:356px;color:#fff;">
        <div class="container" id="footer-content">
            <div class="row" style="border-bottom:#515151 1px solid;">
                <div class="float-left padding-left-0 text-left">
                    <div style="margin-top:90px;margin-bottom:82px;font-size:48px;letter-spacing: 1.71px;">魔法行程单-让路书更智慧</div>
                </div>
                <div class="float-right">
                    <div style="float:right;margin-left:10px;">
                        <div style="color:#DFDFDF;font-size:14px;margin-top:102px;margin-bottom:78px;letter-spacing: 0.5px">
                            <div style="float:right;text-align:left;">
                                如有任何问题，请联系李小姐<br />
                                电话：18500538210
                            </div>
                        </div>
                    </div>
                    <div style="float:right;">
                        <img src="{{URL::asset('img/qrcode-new.jpg')}}" style="width:150px;height:150px;margin-top:42px;margin-bottom:28px;border:2px solid #fff;" />
                    </div>
                </div>
            </div>
            <div style="color:#DFDFDF;font-size:14px;letter-spacing: 0.5px">
                <div style="margin-top:30px;">本站隶属于美景听听（北京）科技有限公司，&nbsp;京ICP备 15053860号 营业执照</div>
                <div style="margin-bottom:68px;">美景听听（北京）科技有限公司 注册地址：北京市石景山实兴大街30号院3号楼2层-1063房间</div>
            </div>
        </div>
        <div class="clear"></div>
    </footer>
@show
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{ URL::asset('js/bootstrap/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap/bootstrapValidator.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('dist/lib/layer/2.4/layer.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.cookie.js') }}"></script>
<!--/_footer 作为公共模版分离出去-->
{{--doT、md5、七牛等相关--}}
<script type="text/javascript" src="{{ URL::asset('/js/doT.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/js/md5.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/js/qiniu.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/js/plupload/plupload.full.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/js/plupload/moxie.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('/js/jquery.form.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('/js/loading/jquery.mloading.js') }}"></script>
{{--common.js--}}
<script type="text/javascript" src="{{ URL::asset('/js/common.js') }}"></script>
<script>
    $(function(){
        //初始化页面高度
        var winHeight=$(window).height();
        var headerHeight=$('nav').height();
        var footerHeight=$('footer').height();
        $('#main-body').css('min-height',winHeight-headerHeight-footerHeight-22)
        $('#main-body').css('border',0)

        var footerHeight=$('#footer-content').height();
        $('footer').height(footerHeight)
    })
</script>

</body>
</html>

@yield('script')