@extends('home.layouts.base')

@section('content')
    <div id="main-body">
        <div class="container padding-top-40 padding-bottom-40 text-center">
            <div class="width-200px text-algin-center margin-auto">
                <img src="{{URL::asset('img/goucha_03.png')}}" />
            </div>
            <h4 class="margin-bottom-20"><b>您已成功注册魔法书路</b></h4>
            <h4><b><span class="font-color-red margin-left-5 margin-right-5">注：初始密码为手机号后六位</span>立刻去<span class="font-color-red margin-left-5 margin-right-5"><a href="{{URL::asset('sign/in')}}">登录</a></span></b></h4>
        </div>
    </div>
@endsection