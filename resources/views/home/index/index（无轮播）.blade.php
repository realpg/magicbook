@extends('home.layouts.base')

@section('content')
<div id="main-body">
    <div class="top">
        <div class="top_banners">
            <img src="{{URL::asset('img/meijing_pic_02.png')}}" class="width-100" />
        </div>
    </div>
    <div class="middle">
        <h2 class="text-algin-center line-height-80 font-color-grey">效果展示</h2>
        <div class="middle_banner">
            <img src="{{URL::asset('img/meijing_pic_04.png')}}" class="width-100" />
        </div>
        <h2 class="font-color-grey text-center line-height-80">选择套餐</h2>
        <div class="container package-card padding-left-50 padding-right-50 margin-bottom-50">
            <ul class="height-457px">
                <li>
                    <h2>版本对比</h2>
                    <h3>试听页面</h3>
                    <h3>自定义城市</h3>
                    <h3>自定义logo</h3>
                    <h3>有效时长</h3>
                    <h3 style="border: 0;">价格</h3>
                </li>
                <li class="hover-card-1">
                    <h2>免费版</h2>
                    <h3>Y</h3>
                    <h3>X</h3>
                    <h3>X</h3>
                    <h3>30天</h3>
                    <h3 style="border-bottom: 0;">免费</h3>
                    <h3 id="hover-card-button-1" style="border-bottom: 0;border-top:1px solid #ccc;margin-top:10px;" hidden>
                        <button type="button" class="btn btn-danger margin-top-25 bg-none bg-red border-color-red width-60 height-50px font-size-18 border-radius-0">立即购买</button>
                    </h3>
                </li>
                <li class="hover-card-2">
                    <h2>美景版</h2>
                    <h3>Y</h3>
                    <h3>Y</h3>
                    <h3>X</h3>
                    <h3>30天</h3>
                    <h3 style="border-bottom: 0;">2元/城市</h3>
                    <h3 id="hover-card-button-2" style="border-bottom: 0;border-top:1px solid #ccc;margin-top:10px;" hidden>
                        <button type="button" class="btn btn-danger margin-top-25 bg-none bg-red border-color-red width-60 height-50px font-size-18 border-radius-0">立即购买</button>
                    </h3>
                </li>
                <li class="hover-card-3">
                    <h2>定制版</h2>
                    <h3>Y</h3>
                    <h3>Y</h3>
                    <h3>Y</h3>
                    <h3>30天</h3>
                    <h3 style="border-bottom: 0;">5元/城市</h3>
                    <h3 id="hover-card-button-3" style="border-bottom: 0;border-top:1px solid #ccc;margin-top:10px;" hidden>
                        <button type="button" class="btn btn-danger margin-top-25 bg-none bg-red border-color-red width-60 height-50px font-size-18 border-radius-0">立即购买</button>
                    </h3>
                </li>
            </ul>
        </div>
    </div>
    <div class="bottom">
        <h2 class="text-algin-center line-height-80 font-color-grey">免费版使用步骤</h2>
        <div class="container font-color-silver-grey line-height-30">
            <div class="row">
                <div class="col-xs-2 col-sm-1 text-algin-right">
                    <img src="{{URL::asset('img/xuhao_03.png')}}" class="width-28px; height-28px" />
                </div>
                <div class="col-xs-10 col-sm-11 padding-left-0 padding-top-2">
                    选择需要生成的城市，随后点击<span class="font-color-red">【生成】</span>按钮
                </div>
            </div>
            <div class="row margin-top-10">
                <div class="col-xs-2 col-sm-1 text-algin-right">
                    <img src="{{URL::asset('img/xuhao_06.png')}}" class="width-28px; height-28px" />
                </div>
                <div class="col-xs-10 col-sm-11 padding-left-0 padding-top-2">
                    使用微信或QQ扫描生成的二维码，或直接复制试听链接使用浏览器打开，即可进入景点音频页面
                </div>
            </div>
            <div class="navbar margin-top-40 height-80px margin-20 padding-0 bg-none border-0">
                <div class="navbar-collapse" id="bs-example-navbar-collapse-1 padding-0 bg-none border-0">
                        <ul class="nav navbar-nav padding-0 width-100 bg-none">
                            <li class="dropdown float-left border-left border-top border-bottom width-25 text-algin-center bg-white border-radius-left style-ellipsis-1">
                                <div class="margin-top-15 margin-bottom-15 border-right">
                                    <a href="#" class="dropdown-toggle font-color-black line-height-50" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        请选择大洲 <img src="{{URL::asset('img/meijing_13.png')}}" />
                                    </a>
                                    <ul class="dropdown-menu width-100">
                                        <li><a href="#">北京</a></li>
                                        <li><a href="#">上海</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="dropdown float-left border-top border-bottom width-25 text-algin-center bg-white style-ellipsis-1">
                                <div class="margin-top-15 margin-bottom-15 border-right">
                                    <a href="#" class="dropdown-toggle font-color-black line-height-50" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        请选择国家 <img src="{{URL::asset('img/meijing_13.png')}}" />
                                    </a>
                                    <ul class="dropdown-menu width-100">
                                        <li><a href="#">北京</a></li>
                                        <li><a href="#">上海</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="dropdown float-left border-top border-bottom width-25 text-algin-center bg-white style-ellipsis-1">
                                <div class="margin-top-15 margin-bottom-15">
                                    <a href="#" class="dropdown-toggle font-color-black line-height-50" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        请选择城市 <img src="{{URL::asset('img/meijing_13.png')}}" />
                                    </a>
                                    <ul class="dropdown-menu width-100">
                                        <li><a href="#">北京</a></li>
                                        <li><a href="#">上海</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="dropdown float-left width-25 text-algin-center bg-red border-radius-right border-top border-bottom border-red style-ellipsis-1">
                                <div class="margin-top-15 margin-bottom-15">
                                    <a href="#" class="dropdown-toggle font-color-black line-height-50" style="color:#fff;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        立刻生成
                                    </a>
                                </div>
                            </li>
                        </ul>
                    {{--</div>--}}
                </div>
            </div>
            <div class="width-200px text-algin-center margin-auto margin-top-10 margin-bottom-10">
                <div class="width-200px height-200px bg-light-grey"></div>
                <h3>扫一扫</h3>
                <button type="button" class="btn btn-danger margin-top-10 bg-none bg-red border-color-red width-100 height-50px font-size-18 border-radius-5px">复制生成的链接</button>
            </div>
        </div>
        <div class="clear"></div>
        <div class="footer_banner">
            <img src="{{URL::asset('img/meijing_pic_06.png')}}" style="width:100%;" />
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(function(){
        $('.hover-card-1').hover(function(){
            $('.hover-card-1').css('box-shadow','0px 4px 20px rgba(0,0,0,.3)');
            $('.hover-card-1').css('transform','scale(1.1)');
            $('.hover-card-1').css('-webkit-transform','scale(1.1)');
            $('.hover-card-1').css('background','#fff');
            $('.hover-card-1 h2').css('background','#E21B14');
            $('.hover-card-1 h2').css('color','#fff');
            $('.hover-card-1 h2').css('margin-top','0');
            $('.hover-card-1 h2').css('padding-top','20px');
            $('.hover-card-1 h3').css('background','#fff');
            $('.hover-card-1').css('border','1px solid #E21B14');
            $('#hover-card-button-1').show();
        },function(){
            $('.hover-card-1').css('box-shadow','none');
            $('.hover-card-1').css('transform','none');
            $('.hover-card-1').css('-webkit-transform','none');
            $('.hover-card-1').css('background','#fff');
            $('.hover-card-1 h2').css('background','#fff');
            $('.hover-card-1 h2').css('color','#000');
            $('.hover-card-1 h2').css('margin-top','0');
            $('.hover-card-1 h2').css('padding-top','20px');
            $('.hover-card-1 h3').css('background','#fff');
            $('.hover-card-1').css('border','0');
            $('.hover-card-1').css('border-right','1px solid #ccc');
            $('#hover-card-button-1').hide();
        });

        $('.hover-card-2').hover(function(){
            $('.hover-card-2').css('box-shadow','0px 4px 20px rgba(0,0,0,.3)');
            $('.hover-card-2').css('transform','scale(1.1)');
            $('.hover-card-2').css('-webkit-transform','scale(1.1)');
            $('.hover-card-2').css('background','#fff');
            $('.hover-card-2 h2').css('background','#E21B14');
            $('.hover-card-2 h2').css('color','#fff');
            $('.hover-card-2 h2').css('margin-top','0');
            $('.hover-card-2 h2').css('padding-top','20px');
            $('.hover-card-2 h3').css('background','#fff');
            $('.hover-card-2').css('border','1px solid #E21B14');
            $('#hover-card-button-2').show();
        },function(){
            $('.hover-card-2').css('box-shadow','none');
            $('.hover-card-2').css('transform','none');
            $('.hover-card-2').css('-webkit-transform','none');
            $('.hover-card-2').css('background','#fff');
            $('.hover-card-2 h2').css('background','#fff');
            $('.hover-card-2 h2').css('color','#000');
            $('.hover-card-2 h2').css('margin-top','0');
            $('.hover-card-2 h2').css('padding-top','20px');
            $('.hover-card-2 h3').css('background','#fff');
            $('.hover-card-2').css('border','0');
            $('.hover-card-2').css('border-right','1px solid #ccc');
            $('#hover-card-button-2').hide();
        });

        $('.hover-card-3').hover(function(){
            $('.hover-card-3').css('box-shadow','0px 4px 20px rgba(0,0,0,.3)');
            $('.hover-card-3').css('transform','scale(1.1)');
            $('.hover-card-3').css('-webkit-transform','scale(1.1)');
            $('.hover-card-3').css('background','#fff');
            $('.hover-card-3 h2').css('background','#E21B14');
            $('.hover-card-3 h2').css('color','#fff');
            $('.hover-card-3 h2').css('margin-top','0');
            $('.hover-card-3 h2').css('padding-top','20px');
            $('.hover-card-3 h3').css('background','#fff');
            $('.hover-card-3').css('border','1px solid #E21B14');
            $('#hover-card-button-3').show();
        },function(){
            $('.hover-card-3').css('box-shadow','none');
            $('.hover-card-3').css('transform','none');
            $('.hover-card-3').css('-webkit-transform','none');
            $('.hover-card-3').css('background','#fff');
            $('.hover-card-3 h2').css('background','#fff');
            $('.hover-card-3 h2').css('color','#000');
            $('.hover-card-3 h2').css('margin-top','0');
            $('.hover-card-3 h2').css('padding-top','20px');
            $('.hover-card-3 h3').css('background','#fff');
            $('.hover-card-3').css('border','0');
            $('#hover-card-button-3').hide();
        });

    })
</script>
@endsection