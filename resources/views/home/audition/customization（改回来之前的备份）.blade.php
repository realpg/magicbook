@extends('home.layouts.base')

@section('content')
<div id="custom-content">
    <div id="main-body">
    @include('home.layouts.banner')
    <div class="middle">
        @include('home.layouts.edition')
    </div>
    <div class="bottom bg-bright-grey padding-top-50 padding-bottom-50 ">
        @include('home.layouts.choice')
        <div id="container">
            @for($i=0;$i<5;$i++)
                <div class="container font-color-silver-grey line-height-50 margin-top-20 margin-bottom-20 padding-left-50 padding-right-50">
                    <div class="row">
                        <div class="col-xs-1 col-sm-1 text-algin-right">
                            <input type="checkbox" name="id_array" class="checkSingle" value="{{$i}}" />
                        </div>
                        <div class="col-xs-11 col-sm-11 text-algin-center">
                            <div class="col-xs-3 col-sm-3 text-algin-center height-50px border-top border-bottom border-left">
                                <div class="dropdown">
                                    <a href="javascript:" class="dropdown-toggle font-color-black vertical-align-middle font-size-16  style-ellipsis-1" id="dropdownMenu{{$i}}" style="text-decoration:none;color:#000;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span id="continent_{{$i}}">请选择大洲</span> <img src="{{URL::asset('img/meijing_13.png')}}" class="height-28px" />
                                    </a>
                                    <ul class="dropdown-menu width-100" aria-labelledby="dropdownMenu{{$i}}">
                                        @if($locations)
                                            @foreach($locations as $continent)
                                                <li><a href="javascript:" onclick="choiceContinent('{{$i}}','{{$continent['id']}}','{{$continent['name']}}')">{{$continent['name']}}</a></li>
                                            @endforeach
                                        @else
                                            <li>请选择大洲</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xs-3 col-sm-3 text-algin-center height-50px border-top border-bottom border-left">
                                <a href="#" class="dropdown-toggle font-color-black vertical-align-middle font-size-16" style="text-decoration:none;color:#000;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span id="country_{{$i}}">请选择国家</span> <img src="{{URL::asset('img/meijing_13.png')}}" class="height-28px" />
                                </a>
                                <ul class="dropdown-menu width-100" id="countries-content-{{$i}}">
                                    <li class="padding-left-10">请选择国家</li>
                                </ul>
                            </div>
                            <div class="col-xs-3 col-sm-3 text-algin-center height-50px vertical-align-middle border-top border-bottom border-left">
                                <a href="#" class="dropdown-toggle font-color-black vertical-align-middle font-size-16 style-ellipsis-1" style="text-decoration:none;color:#000;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span id="city_{{$i}}">请选择城市</span> <img src="{{URL::asset('img/meijing_13.png')}}" class="height-28px" />
                                </a>
                                <ul class="dropdown-menu width-100" id="cities-content-{{$i}}">
                                    <li class="padding-left-10">请选择城市</li>
                                </ul>
                            </div>
                            <input id="item_id_{{$i}}" type="hidden" />
                            <a href="javascript:" onclick="submitSingle({{$i}})" class=" vertical-align-middle" style="color:#fff;text-decoration: none;">
                                <div class="col-xs-3 col-sm-3 text-algin-center height-50px bg-red border-top border-bottom border-red font-color-white font-size-16" style="line-height: 53px;">
                                    立刻生成
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row font-size-16 padding-top-20 font-size-16">
                        <div class="col-xs-11 col-sm-11 col-xs-offset-1 col-sm-offset-1">
                            <div class="col-xs-3 col-sm-3 text-align-left line-height-20 font-color-black">
                                上传logo（150*150jpg或png格式，大小不超过100M）
                            </div>
                            <div class="col-xs-9 col-sm-9 text-algin-center">
                                <div class="col-xs-5 col-sm-5 text-algin-center">
                                    <div class="col-xs-4 col-sm-4 text-algin-center">
                                        <img src="{{URL::asset('img/browse.jpg')}}" id="prv_image_{{$i}}" class="img-rect-30" style="cursor: pointer;" onclick="upload_logo({{$i}})" />
                                        <input type="file" id="upload_file_{{$i}}" style="display: none;" accept="image/jpg, image/png" />
                                        <input type="hidden" id="logo_code_{{$i}}" />
                                    </div>
                                    <div class="col-xs-8 col-sm-8 text-algin-center style-ellipsis-1" id="font_file_{{$i}}">
                                        未选择文件
                                    </div>
                                </div>
                                <div class="col-xs-7 col-sm-7 text-algin-center padding-top-10 style-ellipsis-1">
                                    <input type="text" name="slogans_{{$i}}" id="slogans_{{$i}}" class="form-control" style="border-radius: 0;" placeholder="请输入十字以内的自定义文字">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="package-card container padding-left-50 padding-right-50 font-size-18">
            <div class="card-div height-60px line-height-60 text-center">
                <div class="col-xs-1 col-sm-1 text-algin-left">
                    <input type="checkbox" class="checkAll" id="checkall" />
                </div>
                <div class="col-xs-11 col-sm-11 padding-0">
                    <div class="col-xs-9 col-sm-9 text-algin-left padding-left-0">
                        全选
                    </div>
                    <a href="javascript:" onclick="submitAll()" id="submitAll" style="color:#fff;text-decoration: none;">
                        <div class="col-xs-3 col-sm-3 text-algin-center bg-red border-top border-bottom border-red font-color-white font-size-16 style-ellipsis-1" style="line-height: 56px;">
                            批量生成
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
    <script id="countries-content-template" type="text/x-dot-template">
        <li><a href="javascript:" onclick="choiceCities('@{{=it.index}}','@{{=it.id}}','@{{=it.continent_id}}','@{{=it.name}}')">@{{=it.name}}</a></li>
    </script>
    <script id="cities-content-template" type="text/x-dot-template">
        <li><a href="javascript:" onclick="determineCity('@{{=it.index}}','@{{=it.id}}','@{{=it.name}}')">@{{=it.name}}</a></li>
    </script>
</div>
<div id="custom-pay" hidden>
    <div id="main-body">
        <div class="container package-card padding-top-150 padding-bottom-150">
            <div class="card-div row border-radius-10px margin-left-10 margin-right-10">
                <div class="height-50px line-height-50 bg-grey-white">
                    <div class="col-xs-8 col-sm-8">订单提交成功，请尽快付款</div>
                    <div class="col-xs-4 col-sm-4 text-right">应付金额<span class="font-color-red margin-left-10 margin-right-10 font-size-22" id="payPrice">50</span>元</div>
                </div>
                <div>
                    <div class="col-xs-7 col-sm-7 padding-top-40 padding-bottom-40 padding-right-50 padding-left-50" id="payInfo">
                        <h4>订单号 :<span id="order"></span></h4>
                        <p>距离二维码过期还剩<span class="font-color-red margin-left-10 margin-right-10 font-size-22" id="time">45</span>秒，过期后请刷新页面重新获取二维码</p>
                        <p class="text-algin-center margin-top-40 margin-bottom-40">
                        <div class="width-200px height-200px bg-light-grey margin-auto" id="qrcode"></div>
                        </p>
                        <h4 class="text-algin-center">立即支付扫码</h4>
                    </div>
                    <div class="col-xs-5 col-sm-5 padding-top-70 padding-bottom-70 text-center" style="border-left:1px #ccc solid;">
                        <img src="{{URL::asset('img/pay_ts.png')}}"  class="height-50" >
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        var time=45;
        $(function(){

        })
        function choiceContinent(index,continent_id,continent_name){
            $('#continent_'+index).text(continent_name)
            var param={
                version: '{{$custom['code']}}',
                continent_id:continent_id,
                _token: "{{ csrf_token() }}"
            }
            getCountries('{{URL::asset('')}}', param, function (ret) {
                if (ret.result == true) {
                    var data=ret.ret
                    $('#countries-content-'+index).html('');
                    for(var i=0;i<data.length;i++){
                        data[i]['index']=index
                        data[i]['continent_id']=continent_id
                        var interText = doT.template($("#countries-content-template").text())
                        $("#countries-content-"+index).append(interText(data[i]))
                    }
                } else {
                    // console.log('getCountry err is :' +JSON.stringify(ret.message))
                }
            })
        }
        function choiceCities(index,country_id,continent_id,country_name){
            $('#country_'+index).text(country_name)
            var param={
                version: '{{$custom['code']}}',
                country_id:country_id,
                continent_id:continent_id,
                _token: "{{ csrf_token() }}"
            }
            getCities('{{URL::asset('')}}', param, function (ret) {
                if (ret.result == true) {
                    var data=ret.ret
                    $('#cities-content-'+index).html('');
                    for(var i=0;i<data.length;i++){
                        data[i]['index']=index
                        var interText = doT.template($("#cities-content-template").text())
                        $("#cities-content-"+index).append(interText(data[i]))
                    }
                } else {
                    // console.log('getCountry err is :' +JSON.stringify(ret.message))
                }
            })
        }
        function determineCity(index,city_id,city_name){
            $('#city_'+index).text(city_name)
            $('#item_id_'+index).val(city_id)
        }
        //全选
        $(".checkAll").click(function () {
            if ($(this).is(":checked") == true) {
                $("input[class=checkSingle]").each(function (h) {
                    $(this).prop("checked",true);
                });
            }else {
                $("input[class=checkSingle]").each(function (h) {
                    $(this).prop("checked",false);
                });
            }
        });
        //选中一行
        var checknum = 5;
        $(".checkSingle").click(function () {
            if ($(this).is(":checked") == true) {
                if($(".checkSingle:checked").length == checknum){
                    $(".checkAll").prop("checked",true);
                }else{
                    $(".checkAll").prop("checked",false);
                }

            }else {
                if($(".checkSingle:checked").length == checknum){
                    $(".checkAll").prop("checked",true);
                }else{
                    $(".checkAll").prop("checked",false);
                }
            }
        });
        function submitSingle(index){
            var item_id=$('#item_id_'+index).val();
            if(item_id){
                // console.log("array is : "+JSON.stringify(array))
                //logo
                var upload_file=$('#logo_code_'+index).val()?$('#logo_code_'+index).val():null;
                // console.log("upload_array is : "+JSON.stringify(upload_array))
                //文字
                var slogans=$('#slogans_'+index).val();
                // console.log("slogans_array is : "+JSON.stringify(slogans_array))
                if(slogans.length>10){
                    layer.msg('请输入10字以内的自定义文字', {icon: 2, time: 2000})
                }
                else{
                    var data_array=new Array();
                    var data={
                        'city_id':item_id,
                        'slogan':slogans,
                        'logo':upload_file
                    }
                    data_array.push(data);
                    var param={
                        version: '{{$custom['code']}}',
                        data:JSON.stringify(data_array),
                        _token: "{{ csrf_token() }}"
                    }
                    console.log('param is : '+param)
                    var pay_price=parseFloat('{{$custom['price']}}');
                    submitDo(pay_price,param);
                }
            }
            else{
                layer.msg('请选择城市', {icon: 2, time: 2000})
            }
        }
        function submitAll(){
            if($(".checkSingle:checked").length >0){
                var str=''
                var count=0
                $("input:checkbox[name='id_array']:checked").each(function() {
                    var index=$(this).val();
                    var item_id=$('#item_id_'+index).val()
                    if(item_id){
                        count++
                        var city=$('#city_'+index).text();
                        str+='<div class="col-xs-3 col-sm-3 text-oneline">'+city+'</div>'
                    }
                });
                if(count==$(".checkSingle:checked").length){
                    var price=parseFloat('{{$custom['price']}}')
                    $('#price').text(count*price)
                    $('#payPrice').text(payPrice);
                    $('#submitAll').attr('data-toggle','modal')
                    $('#submitAll').attr('data-target','#myModal')
                    $('#city_names').html(str)
                }
                else{
                    layer.msg('请选择城市', {icon: 2, time: 2000})
                }
            }
            else{
                layer.msg('请选择要生成的城市', {icon: 2, time: 2000})
            }
        }
        $("#submitPayInfo").click(function(){
            var data_array=new Array();
            var status=true
            $("input:checkbox[name='id_array']:checked").each(function() {
                var index=$(this).val();
                var item_id=$('#item_id_'+index).val()
                //图片
                var upload_file=$('#logo_code_'+index).val()?$('#logo_code_'+index).val():null;
                //文字
                var slogans=$('#slogans_'+index).val();
                var data={
                    'city_id':item_id,
                    'slogan':slogans,
                    'logo':upload_file
                }
                data_array.push(data);
            });
            if(status){
                {{--var param={--}}
                    {{--version: '{{$custom['code']}}',--}}
                    {{--cities: array,--}}
                    {{--logos: upload_array,--}}
                    {{--slogans: slogans_array,--}}
                    {{--_token: "{{ csrf_token() }}"--}}
                {{--}--}}
                var param={
                    version: '{{$custom['code']}}',
                    data: JSON.stringify(data_array),
                    _token: "{{ csrf_token() }}"
                }
                console.log('param is : '+JSON.stringify(param))
                var count=$(".checkSingle:checked").length;
                var price=parseFloat('{{$custom['price']}}');
                var pay_price=count*price
                submitDo(pay_price,param);
            }
            else{
                layer.msg('请输入10字以内的自定义文字', {icon: 2, time: 2000})
                $('#dismiss_modal').click();
            }
        })
        var pay_str=''
        function submitDo(price,param){
            $("body").mLoading();
            prepay('{{URL::asset('')}}', param, function (ret) {
                $("body").mLoading("hide");
                console.log("prepay is : "+JSON.stringify(ret))
                if (ret.result == true) {
                    $('#custom-content').hide();
                    $('#custom-pay').show();
                    $('#order').text(ret.ret.data.out_trade_no);
                    $('#payPrice').text(price);
                    $('#qrcode').html('<img src="'+ret.ret.data.qrcode_img_url+'" class="width-100" />');
                    CountDown()
                    $('#dismiss_modal').trigger('click');
                    pay_str=$('#payInfo').html()
                } else {
                    layer.msg(ret.message, {icon: 2, time: 2000})
                    $('#dismiss_modal').trigger('click');
                }
            })
        }
        function submitDoAgain(){
            $('#payInfo').html(pay_str)
            time=45
            CountDown()
        }

        //倒计时
        var setTime;
        function CountDown(){
            setTime=setInterval(function(){
                if(time<=0){
                    $('#payInfo').html('<h4>支付二维码已过期，<a href="javascript:" onclick="submitDoAgain()"><span class="font-color-red margin-left-10 margin-right-10 font-size-22">请点击</span>重新生成！</a></h4>')
                    clearInterval(setTime);
                    return;
                }
                if(time%3==0){
                    var orderId=$('#order').text();
                    var param={
                        nowTime: (parseInt(new Date().getTime())).toString(),
                        orderId: orderId,
                        _token: "{{ csrf_token() }}"
                    }
                    console.log('getQrcodeState param is : '+JSON.stringify(param))

                    getQrcodeState('{{URL::asset('')}}', param, function (ret) {
                        console.log('getQrcodeState is : '+JSON.stringify(ret))
                        if (ret.result == true) {
                            var data=ret.ret;
                            if(data.code==0){
                                location.href="{{URL::asset('/pay/success')}}"
                            }
                            else if(data.code==1){
                                location.href="{{URL::asset('/pay/fail')}}"
                            }
                        } else {
                            layer.msg(ret.message+",请重新生成", {icon: 2, time: 2000})
                            window.location.reload()
                        }
                    })
                }
                time--;
                $("#time").text(time);
            },1000);
        }

        //上传图片
        function upload_logo(index){
            $('#upload_file_'+index).click()
            $('#upload_file_'+index).on("change",function(e){
                //判断图片类型、大小
                var file = $(this)[0].files[0],
                    imgSrc = $(this)[0].value,
                    url = URL.createObjectURL(file);
                if (!/\.(jpg|jpeg|png|JPG|PNG|JPEG)$/.test(imgSrc)){
                    layer.msg("请上传jpg或png格式的图片！", {icon: 2, time: 2000})
                    return false;
                }
                else{
                   //判断图片大小
                    var size = $(this)[0].files[0].size
                    if((size.toFixed(2))>=(100*1024*1024)){
                        layer.msg("请上传小于100M的图片！", {icon: 2, time: 2000})
                        return false;
                    }
                    else{
                        //判断图片的尺寸
                        var _URL = window.URL || window.webkitURL;
                        var img;
                        if (file) {
                            img = new Image();
                            img.onload = function () {
                                // alert(this.width + " " + this.height);
                                if(this.width!=150||this.height!=150){
                                    layer.msg("请上传尺寸为150*150的图片！", {icon: 2, time: 2000})
                                    return false;
                                }
                                else{
                                    if (url) {
                                        $('#prv_image_'+index).attr("src", url) ; //将图片路径存入src中，显示出图片
                                    }
                                    //转码
                                    readFile(file,index)
                                }
                            };
                            img.src = _URL.createObjectURL(file);
                        }
                        // console.log('upload_logo is : '+JSON.stringify(image))


                    }
                }



            });
        }
        //建立一個可存取到該file的url
        function getObjectURL(file) {
            var url = null ;
            // 下面函数执行的效果是一样的，只是需要针对不同的浏览器执行不同的 js 函数而已
            if (window.createObjectURL!=undefined) { // basic
                url = window.createObjectURL(file) ;
            } else if (window.URL!=undefined) { // mozilla(firefox)
                url = window.URL.createObjectURL(file) ;
            } else if (window.webkitURL!=undefined) { // webkit or chrome
                url = window.webkitURL.createObjectURL(file) ;
            }
            return url ;
        }
        //img转码
        function readFile(file,index){
            // var file = obj.files[0];
            //判断类型是不是图片
            if(!/image\/\w+/.test(file.type)){
                alert("请确保文件为图像类型");
                return false;
            }
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(e){
                // alert(this.result); //就是base64
                $('#logo_code_'+index).val(this.result)
                console.log("readFilen "+index+" : "+this.result)
                $('#font_file_'+index).hide()
            }
        }
    </script>
@endsection