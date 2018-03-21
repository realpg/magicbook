@extends('home.layouts.base')

@section('content')
<div id="main-body">
    <div class="container package-card padding-top-150 padding-bottom-150">
        <div class="card-div row border-radius-10px margin-left-10 margin-right-10">
            <div class="height-50px line-height-50 bg-grey-white">
                <div class="col-xs-8 col-sm-8">订单提交成功，请尽快付款</div>
                <div class="col-xs-4 col-sm-4 text-right">应付金额<span class="font-color-red margin-left-10 margin-right-10 font-size-18">50</span>元</div>
            </div>
            <div>
                <div class="col-xs-6 col-sm-6 padding-top-40 padding-bottom-40 padding-right-50 padding-left-50">
                    <h4>订单号 :B2018010312301500001</h4>
                    <p>距离二维码过期还剩<span class="font-color-red margin-left-10 margin-right-10 font-size-18">45</span>秒，过期后请刷新页面重新获取二维码</p>
                    <p class="text-algin-center margin-top-40 margin-bottom-40">
                        <img src="{{URL::asset('img/qrcode.png')}}" class="width-50" >
                    </p>
                    <h4 class="text-algin-center">立即支付扫码</h4>
                </div>
                <div class="col-xs-6 col-sm-6 margin-top-70 margin-bottom-70  text-center">
                    <img src="{{URL::asset('img/pay_ts.png')}}" class="height-350px" >
                </div>
            </div>
        </div>
    </div>
</div>
@endsection