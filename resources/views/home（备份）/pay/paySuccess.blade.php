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
                        <img src="{{URL::asset('img/pay_success.png')}}" width="70" height="70" alt="">
                    </div>
                </div>
                <div class="col-xs-9 col-sm-9 order_num">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 ts_title">
                            <span>支付成功</span>
                        </div>
                        <div class="col-xs-12 col-sm-12 ts_cz" >
                            <span>您可以查看</span>
                            <a href="{{URL::asset('info/tryListen')}}">试听生成记录</a>
                            <span>或查看</span>
                            <a href="{{URL::asset('info/consume')}}">消费记录</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection