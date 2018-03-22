@extends('home.layouts.base')
@section('content')
    <div id="main-body">
        @include('home.layouts.banner')
        <div class="middle">
            @include('home.layouts.edition')
        </div>
        <div class="bottom bg-bright-grey padding-top-50 padding-bottom-50">
            @include('home.layouts.choice')
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
                    <div class="navbar-collapse padding-0 bg-none border-0" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav padding-0 width-100 bg-none">
                            <li class="dropdown float-left border-left border-top border-bottom width-25 text-algin-center bg-white border-radius-left">
                                <div class="margin-top-15 margin-bottom-15 border-right">
                                    <a href="#" class="dropdown-toggle font-color-black line-height-50" style="text-decoration:none;color:#000;" id="dropdownMenu1" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                        请选择大洲 <img src="{{URL::asset('img/meijing_13.png')}}" />
                                    </a>
                                    <ul class="dropdown-menu width-100" aria-labelledby="dropdownMenu1">
                                        <li><a href="#">北京</a></li>
                                        <li><a href="#">上海</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="dropdown float-left border-top border-bottom width-25 text-algin-center bg-white">
                                <div class="margin-top-15 margin-bottom-15 border-right">
                                    <a href="#" class="dropdown-toggle font-color-black line-height-50" style="text-decoration:none;color:#000;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        请选择国家 <img src="{{URL::asset('img/meijing_13.png')}}" />
                                    </a>
                                    <ul class="dropdown-menu width-100">
                                        <li><a href="#">北京</a></li>
                                        <li><a href="#">上海</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="dropdown float-left border-top border-bottom width-25 text-algin-center bg-white">
                                <div class="margin-top-15 margin-bottom-15">
                                    <a href="#" class="dropdown-toggle font-color-black line-height-50" style="text-decoration:none;color:#000;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
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
        </div>
    </div>
@endsection
@section('script')
    <script>
    </script>
@endsection