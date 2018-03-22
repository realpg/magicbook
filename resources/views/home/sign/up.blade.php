@extends('home.layouts.base')

@section('content')
    <style>
    </style>
<div id="main-body">
    <div class="container package-card padding-top-150 padding-bottom-150 font-color-light-grey">
        <div class="card-div row border-radius-10px margin-left-10 margin-right-10">
            <div class="height-50px line-height-50 bg-grey-white">
                <div class="col-xs-8 col-sm-8">注册</div>
                <div class="col-xs-4 col-sm-4 text-right">登录</div>
            </div>
            <div>
                <div class="col-xs-8 col-sm-8 padding-top-40 padding-bottom-40 padding-right-50 padding-left-50" style="border-right:1px #ccc solid;">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control height-50px" placeholder="请输入您的姓名">
                        </div>
                        <div class="form-group margin-top-30">
                            <input type="text" class="form-control height-50px" placeholder="请输入您的手机号">
                        </div>
                        <div class="form-group margin-top-30">
                            <input type="password" class="form-control height-50px" placeholder="请输入密码">
                        </div>
                        <div class="margin-top-30">
                            <div class="padding-0">
                                <div class="float-left margin-right-10">
                                    业务类型<br />
                                    <span class="font-size-10">（多选）</span>
                                </div>
                                <div class="float-left">
                                    <input type="checkbox" class="vertical-align-top">
                                    <span>定制游</span>
                                    <input type="checkbox" class="vertical-align-top">
                                    <span>跟团游</span>
                                    <input type="checkbox" class="vertical-align-top">
                                    <span>自由行</span>
                                    <input type="checkbox" class="vertical-align-top">
                                    <span>其他</span>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="margin-top-30">
                            <div class="padding-0">
                                <input type="radio" id="female" name="">
                                <label for="female" class="font-color-red">我已阅读并同意《魔法路书服务条款》</label>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="margin-top-30">
                            <button type="button" class="btn btn-danger bg-none bg-red border-color-red width-100 height-40px font-size-18 border-radius-0 height-50px">立 即 注 册</button>
                        </div>
                    </form>
                </div>
                <div class="text-algin-center col-xs-4 col-sm-4 padding-top-40 padding-bottom-40 padding-right-40 padding-left-40">
                    <div class="text-left font-size-16"><b>注册魔法路书：</b></div>
                    <div class="margin-top-20 margin-bottom-20 padding-top-10 padding-bottom-10 font-size-16">中文语音导游，让旅行更有内涵</div>
                    <div class="width-200px margin-auto">
                        <img src="{{URL::asset('img/erweima_03.png')}}" class="width-100" />
                    </div>
                    <div class="padding-top-10 padding-bottom-10 font-size-16">扫描加魔法路书公众号</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(function(){
    })
</script>
@endsection