@extends('home.layouts.base')

@section('content')
    <div id="main-body">
        <div class="container padding-top-40 padding-bottom-40 text-center">
            <div class="width-200px text-algin-center margin-auto">
                <img src="{{URL::asset('img/goucha_06.png')}}" />
            </div>
            <h4 class="margin-bottom-20"><b>支付失败</b></h4>
            <h4>
                <b>
                    您可以
                    <a href="javascript:history.go(-1)">
                        <span class="font-color-red margin-left-5 margin-right-5">重新支付</span>
                    </a>
                    或者
                    <a href="{{URL::asset('/audition/free/')}}">
                        <span class="font-color-red margin-left-5 margin-right-5">获取试听</span>
                    </a>
                </b>
            </h4>
        </div>
    </div>
@endsection