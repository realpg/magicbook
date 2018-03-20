@extends('home.layouts.base')

@section('content')
<style>
    .style_ft{background:rgba(242, 242, 242, 1);}
</style>
<div class="version_con container">
    <div class="version_list row" style="margin-top:40px;">
        <table width="800" height="287" border="0" class="col-xs-12 col-sm-12">
            <thead>
            <tr style="background:rgba(226, 28, 20, 1);">
                <th width="90" height="48" style="font-size:13px;">版本</th>
                <th width="232">免费版</th>
                <th width="232">美景版</th>
                <th width="232">定制版</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td height="48" style="background:#E4E4E4;">试听页面</td>
                <td class="support">支持</td>
                <td class="support">支持</td>
                <td class="support">支持</td>
            </tr>
            <tr>
                <td height="48" style="background:#E4E4E4;">自定义城市</td>
                <td>不支持</td>
                <td class="support">支持</td>
                <td class="support">支持</td>
            </tr>
            <tr>
                <td height="48" style="background:#E4E4E4;">自定义LOGO</td>
                <td>不支持</td>
                <td>不支持</td>
                <td class="support">支持</td>
            </tr>
            <tr>
                <td height="48" style="background:#E4E4E4;">有效时长</td>
                <td>30天</td>
                <td>30天</td>
                <td>30天</td>
            </tr>
            <tr>
                <td height="48" style="background:#E4E4E4;">价格</td>
                <td class="size" style="font-size:16px;">免费</td>
                <td class="size" style="font-size:16px;">￥2元/城市</td>
                <td class="size" style="font-size:16px;">￥5元/城市</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="version_type container">
        <span class="float-left">请选择生成类型</span>
        <div class="list float-left">
            <ul>
                <li class="normal float"><a class="select_ver" href="{{URL::asset('/audition/scenery/')}}">美景版</a></li>
                <li class="normal float"><a href="{{URL::asset('/audition/customization')}}">定制版</a></li>
                <li class="normal float"><a href="{{URL::asset('/audition/free')}}">免费版</a></li>
            </ul>
        </div>
    </div>
    @yield('select_content')
</div>
{{--支付弹窗--}}
<div id="pay_mask" style="display:none;"></div>
<div class="pay_ts container" style="display:none;">
    <div class="row">
        <div class="col-xs-12 col-sm-12 title">
            <span>是否确定生成以下城市？</span><br/>
            <span>生成后不可修改，不可撤销</span>
            <div>
                <ul>
                    <li>尼斯</li>
                    <li>巴黎</li>
                    <li>凡尔赛</li>
                    <li>马赛</li>
                    <li>阿维尼翁</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 pay_price">
            <span style="font-size:20px;">共计：</span>
            <span style="font-size:28px;">￥ <span style="color:#ff3333;">10</span>元</span>
        </div>
    </div>
    <div class="row pay_list">
        <div class="col-xs-6 col-sm-6 cancel" style="background: rgba(228, 228, 228, 1);">
            <span>取消</span>
        </div>
        <div class="col-xs-6 col-sm-6 qr_pay" style="background:#ff3333;">
            <a href="{{URL::asset('/pay')}}">确定，去支付</a>
        </div>
    </div>
</div>
<script src="{{URL::asset('js/jquery-1.8.3.min.js')}}"></script>
<script>
    $('.cancel').click(function(){
        $('#pay_mask').css('display','none');
        $('.pay_ts').css('display','none');
    });
    $(document).ready(function(){
        $(".list a").each(function(){
            $this = $(this);
            if($this[0].href==String(window.location)){
                $(".list a").removeClass("select_ver");
                $this.addClass("select_ver");
            }
        });
    });
</script>
@endsection