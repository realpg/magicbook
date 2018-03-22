@extends('home.layouts.base')

@section('content')
    <div id="main-body">
        @include('home.layouts.banner')
        <div class="middle">
            @include('home.layouts.edition')
        </div>
        <div class="bottom bg-bright-grey padding-top-50 padding-bottom-50 ">
            @include('home.layouts.choice')
            <div>
                <div class="container font-color-silver-grey line-height-50 margin-top-20 margin-bottom-20 padding-left-50 padding-right-50">
                    <div class="row">
                        <div class="col-xs-1 col-sm-1 text-algin-right">
                            <input type="checkbox" />
                        </div>
                        <div class="col-xs-11 col-sm-11 text-algin-center">
                            <div class="col-xs-3 col-sm-3 text-algin-center border-top border-bottom border-left">
                                <a href="#" class="dropdown-toggle font-color-black line-height-50 font-size-16" style="text-decoration:none;color:#000;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    请选择大洋洲 <img src="{{URL::asset('img/meijing_13.png')}}" class="height-28px" />
                                </a>
                                <ul class="dropdown-menu width-100">
                                    <li><a href="#">北京</a></li>
                                    <li><a href="#">上海</a></li>
                                </ul>
                            </div>
                            <div class="col-xs-3 col-sm-3 text-algin-center border-top border-bottom border-left">
                                <a href="#" class="dropdown-toggle font-color-black line-height-50 font-size-16" style="text-decoration:none;color:#000;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    请选择国家 <img src="{{URL::asset('img/meijing_13.png')}}" class="height-28px" />
                                </a>
                                <ul class="dropdown-menu width-100">
                                    <li><a href="#">北京</a></li>
                                    <li><a href="#">上海</a></li>
                                </ul>
                            </div>
                            <div class="col-xs-3 col-sm-3 text-algin-center border-top border-bottom border-left">
                                <a href="#" class="dropdown-toggle font-color-black line-height-50 font-size-16" style="text-decoration:none;color:#000;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    请选择城市 <img src="{{URL::asset('img/meijing_13.png')}}" class="height-28px" />
                                </a>
                                <ul class="dropdown-menu width-100">
                                    <li><a href="#">北京</a></li>
                                    <li><a href="#">上海</a></li>
                                </ul>
                            </div>
                            <div class="col-xs-3 col-sm-3 text-algin-center bg-red border-top border-bottom border-red font-color-white font-size-16" style="line-height: 53px;">
                                <a href="">
                                    立刻生成
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container font-color-silver-grey line-height-50 margin-top-20 margin-bottom-20 padding-left-50 padding-right-50">
                    <div class="row">
                        <div class="col-xs-1 col-sm-1 text-algin-right">
                            <input type="checkbox" />
                        </div>
                        <div class="col-xs-11 col-sm-11 text-algin-center">
                            <div class="col-xs-3 col-sm-3 text-algin-center border-top border-bottom border-left">
                                <a href="#" class="dropdown-toggle font-color-black line-height-50 font-size-16" style="text-decoration:none;color:#000;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    请选择大洋洲 <img src="{{URL::asset('img/meijing_13.png')}}" class="height-28px" />
                                </a>
                                <ul class="dropdown-menu width-100">
                                    <li><a href="#">北京</a></li>
                                    <li><a href="#">上海</a></li>
                                </ul>
                            </div>
                            <div class="col-xs-3 col-sm-3 text-algin-center border-top border-bottom border-left">
                                <a href="#" class="dropdown-toggle font-color-black line-height-50 font-size-16" style="text-decoration:none;color:#000;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    请选择国家 <img src="{{URL::asset('img/meijing_13.png')}}" class="height-28px" />
                                </a>
                                <ul class="dropdown-menu width-100">
                                    <li><a href="#">北京</a></li>
                                    <li><a href="#">上海</a></li>
                                </ul>
                            </div>
                            <div class="col-xs-3 col-sm-3 text-algin-center border-top border-bottom border-left">
                                <a href="#" class="dropdown-toggle font-color-black line-height-50 font-size-16" style="text-decoration:none;color:#000;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    请选择城市 <img src="{{URL::asset('img/meijing_13.png')}}" class="height-28px" />
                                </a>
                                <ul class="dropdown-menu width-100">
                                    <li><a href="#">北京</a></li>
                                    <li><a href="#">上海</a></li>
                                </ul>
                            </div>
                            <div class="col-xs-3 col-sm-3 text-algin-center bg-red border-top border-bottom border-red font-color-white font-size-16" style="line-height: 53px;">
                                <a href="">
                                    立刻生成
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="package-card container padding-left-50 padding-right-50 font-size-18">
                <div class="card-div height-60px line-height-60 text-center">
                    <div class="col-xs-1 col-sm-1 text-algin-left">
                        <input type="checkbox" />
                    </div>
                    <div class="col-xs-11 col-sm-11 padding-0">
                        <div class="col-xs-9 col-sm-9 text-algin-left padding-left-0">
                            全选
                        </div>
                        <div class="col-xs-3 col-sm-3 text-algin-center bg-red border-top border-bottom border-red font-color-white font-size-16" style="line-height: 56px;">
                            <a href="">
                                批量生成
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
    </script>
@endsection