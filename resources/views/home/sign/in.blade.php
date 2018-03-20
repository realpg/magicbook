@extends('home.layouts.base')

@section('content')
<div id="main-body">
    <div class="container package-card padding-top-150 padding-bottom-150" style="color:#7E7E7E;">
        <div class="card-div row border-radius-10px margin-left-10 margin-right-10">
            <div class="height-50px line-height-50" style="background:#F5F5F5;">
                <div class="col-xs-8 col-sm-8">登录</div>
                <div class="col-xs-4 col-sm-4 text-right">立即登录</div>
            </div>
            <div>
                <div class="col-xs-8 col-sm-8 padding-top-40 padding-bottom-40 padding-right-50 padding-left-50" style="border-right:1px #ccc solid;">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="请输入手机号">
                        </div>
                        <div class="form-group margin-top-30">
                            <input type="password" class="form-control" placeholder="请输入密码">
                        </div>
                        <div class="margin-top-30">
                            <div class="col-xs-6 col-sm-6 padding-0">
                                <input type="checkbox" class="vertical-align-top">
                                <span class="margin-left-5">记住密码</span>
                            </div>
                            <div class="col-xs-6 col-sm-6 font-color-red padding-0 text-right">
                                <a href="">
                                    忘记密码？
                                </a>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="margin-top-30">
                            <button type="button" class="btn btn-danger bg-none bg-red border-color-red width-100 height-40px font-size-18 border-radius-0">立 即 登 录</button>
                        </div>
                    </form>
                </div>
                <div class="col-xs-4 col-sm-4 text-center">
                    <div class="width-200px text-algin-center margin-auto">
                        <div class="width-200px height-200px bg-light-grey margin-top-20 margin-bottom-20"></div>
                        <h4>扫描加魔法路书公众号</h4>
                    </div>
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