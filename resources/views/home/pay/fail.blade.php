@extends('home.layouts.base')

@section('content')
    <div id="main-body">
        <div class="container padding-top-40 padding-bottom-40 text-center">
            <div class="width-200px text-algin-center margin-auto">
                <img src="{{URL::asset('img/goucha_06.png')}}" />
            </div>
            <h4 class="margin-bottom-20"><b>支付失败</b></h4>
            <h4><b>您可以查看<span class="font-color-red margin-left-5 margin-right-5">重新支付</span>或者<span class="font-color-red margin-left-5 margin-right-5">获取试听</span></b></h4>
        </div>
    </div>
@endsection