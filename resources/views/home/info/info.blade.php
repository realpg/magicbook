@extends('home.layouts.base')

@section('content')
    <style>
        .style_ft{border:1px solid rgba(153, 153, 153, 1);background:#fff;}
    </style>
    <div class="main container">
        <div class="row">
            <div class="dh col-xs-12 col-sm-2">
                <ul>
                    <li><a href="{{URL::asset('/info/tryListen/')}}">试听生成记录</a></li>
                    <li><a href="{{URL::asset('/info/consume/')}}">消费记录</a></li>
                    <li class="change"><a href="{{URL::asset('/info/')}}">个人资料</a></li>
                </ul>
            </div>
            <div class="content col-xs-12 col-sm-10">
                <div class="row detail" style="">
                    <div class="col-xs-6 col-sm-3 title">用户ID ：</div>
                    <div class="col-xs-6 col-sm-6 con">1801090001</div>
                </div>
                <div class="row detail" style="">
                    <div class="col-xs-6 col-sm-3 title">姓名 ： </div>
                    <div class="col-xs-6 col-sm-6 con">鲁智深</div>
                </div>
                <div class="row detail" style="">
                    <div class="col-xs-6 col-sm-3 title">公司 ： </div>
                    <div class="col-xs-6 col-sm-6 con">中青旅北京分部</div>
                </div>
                <div class="row detail" style="">
                    <div class="col-xs-6 col-sm-3 title">手机 ： </div>
                    <div class="col-xs-6 col-sm-6 con">13810410821</div>
                </div>
                <div class="row detail" style="">
                    <div class="col-xs-6 col-sm-3 title">业务类型 ： </div>
                    <div class="col-xs-6 col-sm-6 con">跟团游 定制游</div>
                </div>
            </div>
        </div>
    </div>
@endsection