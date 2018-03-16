@extends('home.layouts.base')

@section('content')
<style>
     .style_ft{background:rgba(242, 242, 242, 1);}
</style>
<div class="version_con container addheight">
    <div class="title">
        <span style="color:#FF3333;">魔法路书</span>
        <span style="color:#666666;">-让路书更智能</span>
    </div>
    <div class="version_botton">
        <ul>
            <li class="drift"><a href="#free_produce">免费试用</a></li>
            <li class="drift"><a href="{{URL::asset('/audition/scenery/')}}">付费使用</a></li>
            <li class="drift"><a href="{{URL::asset('/audition/scenery/')}}">付费使用</a></li>
        </ul>
    </div>
    <div class="version_list">
        <table width="800" height="287" border="0">
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
</div>
<div class="version_show">
    <div class="content float-left">
        <p class="bigtitle">效果展示</p>
        <p class="smalltitle">免费版/美景版</p>
        <p class="smalltitle" style="font-weight:500;">排版整洁美观，景点布局显示清晰</p>
        <p class="smalltitle" style="margin-top:40px;">定制版</p>
        <p class="smalltitle" style="font-weight:500;">在免费版/美景版的基础上,下方可</p>
        <p class="smalltitle" style="font-weight:500;">以定制品牌专属LOGO及宣传语，</p>
        <p class="smalltitle" style="font-weight:500;">使您拥有更精准的营销推广效果</p>
    </div>
    <div class="img float-left">
        <div class="mj float-left">
            <div>
                <img src="{{URL::asset('img/content.jpg')}}" width="213" height="378" alt="">
            </div>
            <p>免费版/美景版</p>
        </div>
        <div class="mj float-left">
            <div>
                <img src="{{URL::asset('img/content.jpg')}}" width="213" height="378" alt="">
            </div>
            <p>定制版</p>
        </div>
    </div>
</div>
<div class="version_con container addheight">
    <div class="demand">
        <p class="head">免费版试用步骤</p>
        <p class="other">1.选择需要生成的城市，随后点击【生成】按钮</p>
        <p class="other">2.使用微信或QQ扫描生成的二维码，或直接复制试听</p>
        <p class="other">链接使用浏览器打开，即可进入景点音频页面</p>
    </div>
    <div class="produce" id="free_produce">
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
</div>
@endsection