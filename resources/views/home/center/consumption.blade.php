@extends('home.layouts.base')

@section('content')
<div id="main-body">
    <div class="container margin-top-100">
        @include('home.layouts.center')
        <div class="width-100 text-center padding-5">
            <div class="line-height-40">
                <div class="col-xs-4 col-sm-4 float-left font-size-16">
                    <div class="col-xs-7 col-sm-7 text-right">
                        按版本选择
                    </div>
                    <div class="col-xs-2 col-sm-2">
                        <img src="{{URL::asset('img/xuanxiangka_03.png')}}" class="width-35px vertical-align-middle" />
                        {{--<span class="glyphicon glyphicon-menu-up font-size-10 height-10px display-block"></span>--}}
                        {{--<sapn class="glyphicon glyphicon-menu-down font-size-10 height-10px display-block"></sapn>--}}
                    </div>
                    <div class="col-xs-3 col-sm-3 text-right padding-0">
                        <span class="width-100 height-100 border-right"></span>
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 float-left">
                    <input type="text" class="form-control border-0 width-90 float-left" style="border-radius:0;border-bottom:1px solid #989898;box-shadow:none;" placeholder="请输入订单号查询" />
                    <button class="width-10 float-left bg-none border-0">
                        <img src="{{URL::asset('img/search_03.png')}}" class="height-40px"  />
                    </button>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="table-responsive">
            <table class="table border-0">
                <thead>
                <tr class=" bg-lime-grey">
                    <th class="text-center">订单</th>
                    <th class="text-center">时间</th>
                    <th class="text-center">城市数量</th>
                    <th class="text-center">版本类型</th>
                    <th class="text-center">金额（元）</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">P2018010708301500012</td>
                    <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">2018-01-17 08:30:15</td>
                    <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">5</td>
                    <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">美景版</td>
                    <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">10</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection