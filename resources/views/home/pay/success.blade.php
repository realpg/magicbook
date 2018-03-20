@extends('home.layouts.base')

@section('content')
    <div id="main-body">
        <div class="container padding-top-40 padding-bottom-40 text-center">
            <div class="width-200px text-algin-center margin-auto">
                <img src="{{URL::asset('img/goucha_03.png')}}" />
            </div>
            <h4 class="margin-bottom-20"><b>您已支付成功</b></h4>
            <h4><b>您可以查看<span class="font-color-red margin-left-5 margin-right-5">生成记录</span>或者<span class="font-color-red margin-left-5 margin-right-5">消费记录</span></b></h4>
        </div>
    </div>
@endsection