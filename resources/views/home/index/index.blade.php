@extends('home.layouts.base')

@section('content')
<div id="main-body">
    @include('home.layouts.banner')
    <div class="middle">
        @if($common['middle_banner'])
        <h2 class="text-algin-center line-height-80 font-color-grey">效果展示</h2>
        <div class="middle_banner">
            <div id="carousel-middel-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                @if(count($common['middle_banner'])>1)
                <ol class="carousel-indicators">
                    @foreach($common['middle_banner'] as $k=>$middle_banner)
                    <li data-target="#carousel-middel-generic" data-slide-to="{{$k}}" {{$k==0?'class="active"':''}}></li>
                    @endforeach
                </ol>
                @endif
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    @foreach($common['middle_banner'] as $k=>$middle_banner)
                    <div class="item {{$k==0?'active':''}}">
                        <img src="{{$middle_banner['image']}}" alt="{{$middle_banner['title']}}" class="margin-auto">
                    </div>
                    @endforeach
                </div>
                <!-- Controls -->
                @if(count($common['middle_banner'])>1)
                <a class="left carousel-control" style="background: none;" href="#carousel-middel-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" style="background: none;" href="#carousel-middel-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                @endif
            </div>
        </div>
        @endif
        @include('home.layouts.edition')
    </div>
    <div class="bottom">
        <h2 class="text-algin-center line-height-80 font-color-grey">免费版使用步骤</h2>
        <div class="container font-color-silver-grey line-height-30">
            <div class="row">
                <div class="col-xs-2 col-sm-1 text-algin-right">
                    <img src="{{URL::asset('img/xuhao_03.png')}}" class="width-28px; height-28px" />
                </div>
                <div class="col-xs-10 col-sm-11 padding-left-0 padding-top-2">
                    选择需要生成的城市，随后点击<span class="font-color-red">【立刻生成】</span>按钮
                </div>
            </div>
            <div class="row margin-top-10">
                <div class="col-xs-2 col-sm-1 text-algin-right">
                    <img src="{{URL::asset('img/xuhao_06.png')}}" class="width-28px; height-28px" />
                </div>
                <div class="col-xs-10 col-sm-11 padding-left-0 padding-top-2">
                    使用微信或QQ扫描生成的二维码，或直接复制试听链接使用浏览器打开，即可进入景点音频页面
                </div>
            </div>
            <div class="navbar margin-top-40 height-80px margin-20 padding-0 bg-none border-0">
                <div class="navbar-collapse padding-0 bg-none border-0" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav padding-0 width-100 bg-none">
                        <li class="dropdown float-left border-left border-top border-bottom width-25 text-algin-center bg-white border-radius-left">
                            <div class="margin-top-15 margin-bottom-15 border-right">
                                <a href="#" class="dropdown-toggle font-color-black line-height-50" style="text-decoration:none;color:#000;" id="dropdownMenu1" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                    <span id="continent">请选择大洲</span> <img src="{{URL::asset('img/meijing_13.png')}}" />
                                </a>
                                <ul class="dropdown-menu width-100" aria-labelledby="dropdownMenu1">
                                    @if($common['cities'])
                                        @foreach($common['cities'] as $continent)
                                        <li><a href="javascript:" onclick="choiceContinent('{{$continent['id']}}','{{$continent['name']}}')">{{$continent['name']}}</a></li>
                                        @endforeach
                                    @else
                                        <li>请选择大洲</li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown float-left border-top border-bottom width-25 text-algin-center bg-white">
                            <div class="margin-top-15 margin-bottom-15 border-right">
                                <a href="#" class="dropdown-toggle font-color-black line-height-50" style="text-decoration:none;color:#000;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span id="country">请选择国家</span> <img src="{{URL::asset('img/meijing_13.png')}}" />
                                </a>
                                <ul class="dropdown-menu width-100" id="countries-content">
                                    <li class="padding-left-10">请选择国家</li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown float-left border-top border-bottom width-25 text-algin-center bg-white">
                            <div class="margin-top-15 margin-bottom-15">
                                <a href="#" class="dropdown-toggle font-color-black line-height-50" style="text-decoration:none;color:#000;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span id="city">请选择城市</span> <img src="{{URL::asset('img/meijing_13.png')}}" />
                                </a>
                                <ul class="dropdown-menu width-100" id="cities-content">
                                    <li class="padding-left-10">请选择城市</li>
                                </ul>
                            </div>
                        </li>
                        <input id="item_id" type="hidden" />
                        <a href="#" onclick="submit()" class="dropdown-toggle font-color-black line-height-50" style="color:#fff;text-decoration: none;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <li class="dropdown float-left width-25 text-algin-center bg-red border-radius-right border-top border-bottom border-red style-ellipsis-1">
                                <div class="margin-top-15 margin-bottom-15">
                                    立刻生成
                                </div>
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="width-200px text-algin-center margin-auto margin-top-10 margin-bottom-10" id="code-show" hidden>
                <div class="width-200px height-200px bg-light-grey" id="rqcode"></div>
                <h3>扫一扫</h3>
                <button type="button" class="btn btn-danger margin-top-10 bg-none bg-red border-color-red width-100 height-50px font-size-18 border-radius-5px" id="copy"  data-clipboard-text="">复制生成的链接</button>
            </div>
        </div>
        <div class="clear"></div>
        @if($common['footer_banner'])
        <div class="footer_banner">
            <img src="{{$common['footer_banner']['image']}}" class="width-100" />
        </div>
        @endif
    </div>
</div>
<script id="countries-content-template" type="text/x-dot-template">
    <li><a href="javascript:" onclick="choiceCities('@{{=it.id}}','@{{=it.continent_id}}','@{{=it.name}}')">@{{=it.name}}</a></li>
</script>
<script id="cities-content-template" type="text/x-dot-template">
    <li><a href="javascript:" onclick="determineCity('@{{=it.id}}','@{{=it.name}}')">@{{=it.name}}</a></li>
</script>
@endsection
@section('script')
<script type="text/javascript" src="{{ URL::asset('js/clipboard.min.js') }}"></script>
<script>
    $(function(){
        var continent_l = $('#continent');
        var country_l = $('#country');
        var city_l = $('#city');
        var item_id_l=$('#item_id');
        //页面初始化时，如果帐号密码cookie存在则填充
        if(getCookie('continent_c') && getCookie('country_c') && getCookie('city_c') && getCookie('item_id_c')){
            continent_l.text(getCookie('continent_c'))
            country_l.text(getCookie('country_c'))
            city_l.text(getCookie('city_c'))
            item_id_l.val(getCookie('item_id_c'))
        }
    })
    function choiceContinent(continent_id,continent_name){
        $('#continent').text(continent_name)
        var param={
            version: 'free',
            continent_id:continent_id,
            _token: "{{ csrf_token() }}"
        }
        getCountries('{{URL::asset('')}}', param, function (ret) {
            if (ret.result == true) {
                var data=ret.ret
                $('#countries-content').html('');
                for(var i=0;i<data.length;i++){
                    data[i]['continent_id']=continent_id
                    var interText = doT.template($("#countries-content-template").text())
                    $("#countries-content").append(interText(data[i]))
                }
            } else {
                console.log('getCountry err is :' +JSON.stringify(ret.message))
            }
        })
    }
    function choiceCities(country_id,continent_id,country_name){
        $('#country').text(country_name)
        var param={
            version: 'free',
            country_id:country_id,
            continent_id:continent_id,
            _token: "{{ csrf_token() }}"
        }
        getCities('{{URL::asset('')}}', param, function (ret) {
            if (ret.result == true) {
                var data=ret.ret
                $('#cities-content').html('');
                for(var i=0;i<data.length;i++){
                    var interText = doT.template($("#cities-content-template").text())
                    $("#cities-content").append(interText(data[i]))
                }
            } else {
                console.log('getCountry err is :' +JSON.stringify(ret.message))
            }
        })
    }
    function determineCity(city_id,city_name){
        $('#city').text(city_name)
        $('#item_id').val(city_id)
    }
    function submit(){
        $("body").mLoading();
        var item_id=$('#item_id').val()
        if(item_id){
            var param = {
                item_id: item_id,
                _token: "{{ csrf_token() }}"
            }

            submitFree('{{URL::asset('')}}', param, function (ret) {
                $("body").mLoading("hide");
                console.log('submitFree is : '+JSON.stringify(ret))
                if (ret.result == true) {
                    $('#rqcode').html('<img src="'+ret.ret.image+'" class="width-100" />')
                    $('#copy').attr('data-clipboard-text',ret.ret.url)
                    $('#code-show').show()
                    //获取成功删除cookie
                    delCookie('continent_c')
                    delCookie('country_c')
                    delCookie('city_c')
                    delCookie('item_id_c')
                } else {
                    if(ret.code=='101'){
                        //如果没登录，创建cookie
                        setCookie('continent_c',$('#continent').text(),7); //保存帐号到cookie，有效期7天
                        setCookie('country_c',$('#country').text(),7); //保存帐号到cookie，有效期7天
                        setCookie('city_c',$('#city').text(),7); //保存帐号到cookie，有效期7天
                        setCookie('item_id_c',$('#item_id').val(),7); //保存帐号到cookie，有效期7天
                        window.location.replace("{{URL::asset('/sign/in')}}");
                    }
                    else{
                        layer.msg(ret.message, {icon: 2, time: 2000})
                    }
                    $("body").mLoading("hide");
                }
            })
        }
        else{
            layer.msg('请选择城市', {icon: 2, time: 2000})
            $("body").mLoading("hide");
        }
    }
    $("#copy").click(function () {
        var clipboard = new Clipboard('#copy');
        clipboard.on('success', function(e) {
            // console.log(e);
            layer.msg('复制成功', {icon: 1, time: 2000})
        });
        clipboard.on('error', function(e) {
            // console.log(e);
            layer.msg('复制失败，请扫描图中二维码', {icon: 2, time: 2000})
        });
    });

    //设置cookie
    function setCookie(name,value,day){
        var date = new Date();
        date.setDate(date.getDate() + day);
        document.cookie = name + '=' + value + ';expires='+ date;

        // $.cookie(name, value);
    };
    //获取cookie
    function getCookie(name){
        var reg = RegExp(name+'=([^;]+)');
        var arr = document.cookie.match(reg);
        if(arr){
            return arr[1];
        }else{
            return '';
        }

        // $.cookie(name);
    };
    //删除cookie
    function delCookie(name){
        setCookie(name,null,-1);
        // $.cookie(name, null);
    };
</script>
@endsection