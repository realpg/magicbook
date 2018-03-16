@extends('home.layouts.base')

@section('content')
    <style>
        .style_ft{border:1px solid rgba(153, 153, 153, 1);background:#fff;}
    </style>
    <div class="version_con container" style="padding:0px;background:#fff;">
        <div class="pay_main">
            <div class="row">
                <div class="col-xs-12 col-sm-9 order_ts">
                    <span style="margin:10px;">订单提交成功，请尽快付款</span>
                    <span>订单号 :B2018010312301500001</span>
                </div>
                <div class="col-xs-12 col-sm-3 order_num">
                    <span>应付金额</span>
                    <span><span class="jine">10.00</span>元</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 order_wx_ts">
                    <span class="title">微信支付</span>
                    <span class="wx_ts">距离二维码过期还剩
                        <span style="color:#ff3333;">45</span>
                        秒，过期后请刷新页面重新获取二维码</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 order_ewm">
                    <div class="ewm_img">
                        <img src="{{URL::asset('img/erweima_03.png')}}" width="240" height="240" alt="" style="border:1px solid #333;">
                    </div>
                    <div class="ewm_img" style="margin-top:20px;">
                        <img src="{{URL::asset('img/wx.png')}}" width="240" height="50" alt="" >
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 order_phone">
                    <div class="phone_img">
                        <img src="{{URL::asset('img/pay_ts.png')}}" width="280" height="348" alt="" >
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>

    </style>
@endsection