@extends('home.layouts.base')

@section('content')
<div id="main-body">
    <div class="container margin-top-100">
        @include('home.layouts.center')
        <div class="width-100 text-center">
            <div class="line-height-50">
                <div class="width-15 float-left bg-lime-grey">ID号</div>
                <div class="width-15 float-left bg-lime-grey">姓名</div>
                <div class="width-25 float-left bg-lime-grey">公司</div>
                <div class="width-15 float-left bg-lime-grey">手机号</div>
                <div class="width-30 float-left bg-lime-grey">类型</div>
            </div>
        </div>
        <div class="width-100 text-center">
            <div class="line-height-50">
                <div class="width-15 float-left">{{$common['user']['id']}}</div>
                <div class="width-15 float-left">{{$common['user']['username']}}</div>
                <div class="width-25 float-left">{{$common['user']['company']}}</div>
                <div class="width-15 float-left">{{$common['user']['mobile']}}</div>
                <div class="width-30 float-left">{{implode('，',$common['user']['businesses'])}}</div>
            </div>
        </div>
    </div>
</div>
@endsection