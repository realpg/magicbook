@extends('home.audition.show')

@section('select_content')
    <div class="produce" style="margin-top:50px;">
        <div class="select row">
            <select class="col-xs-3 col-sm-3" name="" id="">
                <option value="">请选择大洲</option>
                <option value="1">欧洲</option>
            </select>
            <select class="col-xs-3 col-sm-3" name="" id="">
                <option value="">请选择国家</option>
                <option value="1">法国</option>
            </select>
            <select class="col-xs-3 col-sm-3" name="" id="">
                <option value="">请选择城市</option>
                <option value="1">巴黎</option>
            </select>
            <button class="col-xs-3 col-sm-3 drift">生成</button>
        </div>
        <div class="make row">
            <div class="illustrate col-xs-12 col-sm-12">
                <p>免费版音频试听页面城市数量有限</p>

                <p>建议使用美景版或定制版以获取更优质的服务</p>
            </div>
            <div class="qr_code col-xs-6 col-sm-6">
                <h4>试听二维码</h4>
                <span class="drift">下载二维码</span>
                <img src="{{URL::asset('img/erweima_03.png')}}" width="200" height="200" alt="">
            </div>
            <div class="try_link col-xs-6 col-sm-6">
                <h4>试听链接</h4>
                <span class="drift">复制试听链接</span>
            </div>
        </div>
    </div>
@endsection