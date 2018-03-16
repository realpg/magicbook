@extends('home.layouts.base')

@section('content')
    <style>
        .style_ft{border:1px solid rgba(153, 153, 153, 1);background:#fff;}
    </style>
    <div class="version_con container" style="padding:0px;background:#fff;height:500px;">
        <div class="pay_result">
            <div class="row">
                <div class="col-xs-3 col-sm-3 order_ts">
                    <div class="ts_img">
                        <img src="{{URL::asset('img/pay_final.png')}}" width="70" height="70" alt="">
                    </div>
                </div>
                <div class="col-xs-9 col-sm-9 order_num">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 ts_title">
                            <span>支付失败</span>
                        </div>
                        <div class="col-xs-12 col-sm-12 ts_cz" >
                            <span>您可以</span>
                            <a href="{{URL::asset('/pay')}}">重新支付</a>
                            <span>或重新</span>
                            <a href="{{URL::asset('/audition/scenery')}}">获取试听</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection