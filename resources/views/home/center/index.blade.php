@extends('home.layouts.base')

@section('content')
<div id="main-body">
    <div class="container margin-top-100">
        @include('home.layouts.center')
        <div class="width-100 text-center">
            <div class="line-height-50">
                <div class="width-20 float-left bg-lime-grey">ID号</div>
                <div class="width-20 float-left bg-lime-grey">姓名</div>
                <div class="width-20 float-left bg-lime-grey">公司</div>
                <div class="width-20 float-left bg-lime-grey">手机号</div>
                <div class="width-20 float-left bg-lime-grey">类型</div>
            </div>
        </div>
        <div class="width-100 text-center">
            <div class="line-height-50">
                <div class="width-20 float-left">1801090001</div>
                <div class="width-20 float-left">鲁智深</div>
                <div class="width-20 float-left">中青旅北京分部</div>
                <div class="width-20 float-left">17636786544</div>
                <div class="width-20 float-left">跟团游，定制旅游</div>
            </div>
        </div>
    </div>
</div>
@endsection