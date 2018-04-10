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
                                        <span id="continent_{{$i}}">请选择大洋洲</span> <img src="{{URL::asset('img/meijing_13.png')}}" class="height-28px" />
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
                            <div class="col-xs-3 col-sm-3 text-algin-center height-50px bg-red border-top border-bottom border-red font-color-white font-size-16" style="line-height: 53px;">
                                <a href="javascript:" onclick="submitSingle({{$i}})" class=" vertical-align-middle" style="color:#fff;text-decoration: none;">
                                    立刻生成
                                </a>
                            </div>
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
                                        <img src="{{URL::asset('img/browse.jpg')}}" id="prv_image_{{$i}}" class="img-rect-30" style="cursor: pointer;" />
                                        <input type="file" id="upload_file_{{$i}}" style="display: none;" accept="image/jpg, image/png" />
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
                    <div class="col-xs-3 col-sm-3 text-algin-center bg-red border-top border-bottom border-red font-color-white font-size-16 style-ellipsis-1" style="line-height: 56px;">
                        <a href="javascript:" onclick="submitAll()" id="submitAll" style="color:#fff;text-decoration: none;">
                            批量生成
                        </a>
                    </div>
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
            //获取七牛token
            initQNUploader();
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
                //城市
                var array=new Array();
                array.push(item_id);
                // console.log("array is : "+JSON.stringify(array))
                //logo
                var upload_file=$('#prv_image_'+index).attr('src');
                var upload_array=new Array();
                upload_array.push(upload_file);
                // console.log("upload_array is : "+JSON.stringify(upload_array))
                //文字
                var slogans=$('#slogans_'+index).val();
                var slogans_array=new Array();
                slogans_array.push(slogans);
                // console.log("slogans_array is : "+JSON.stringify(slogans_array))
                if(slogans.length>10){
                    layer.msg('请输入10字以内的自定义文字', {icon: 2, time: 2000})
                }
                else{
                    var param={
                        version: '{{$custom['code']}}',
                        cities: array,
                        logos: upload_array,
                        slogans: slogans_array,
                        _token: "{{ csrf_token() }}"
                    }
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
                        str+='<div class="col-xs-3 col-sm-3">'+city+'</div>'
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
            var array=new Array();
            var upload_array=new Array();
            var slogans_array=new Array();
            var status=true
            $("input:checkbox[name='id_array']:checked").each(function() {
                var index=$(this).val();
                var item_id=$('#item_id_'+index).val()
                array.push(item_id);
                //图片
                var upload_file=$('#prv_image_'+index).attr('src');
                upload_array.push(upload_file);
                //文字
                var slogans=$('#slogans_'+index).val();
                if(slogans.length>10){
                    status=false
                }
                slogans_array.push(slogans);
            });
            if(status){
                var param={
                    version: '{{$custom['code']}}',
                    cities: array,
                    logos: upload_array,
                    slogans: slogans_array,
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
                    layer.msg(ret.ret, {icon: 2, time: 2000})
                }
            })
        }
        function submitDoAgain(){
            $('#payInfo').html(pay_str)
            time=45
            CountDown()
        }
        //初始化七牛上传模块
        function initQNUploader() {
            var uploader_0 = Qiniu.uploader({
                runtimes: 'html5,flash,html4',      // 上传模式，依次退化
                browse_button: 'prv_image_0',         // 上传选择的点选按钮，必需
                container: 'container',//上传按钮的上级元素ID
                // 在初始化时，uptoken，uptoken_url，uptoken_func三个参数中必须有一个被设置
                // 切如果提供了多个，其优先级为uptoken > uptoken_url > uptoken_func
                // 其中uptoken是直接提供上传凭证，uptoken_url是提供了获取上传凭证的地址，如果需要定制获取uptoken的过程则可以设置uptoken_func
                uptoken: "{{$upload_token}}", // uptoken是上传凭证，由其他程序生成
                // uptoken_url: '/uptoken',         // Ajax请求uptoken的Url，强烈建议设置（服务端提供）
                // uptoken_func: function(file){    // 在需要获取uptoken时，该方法会被调用
                //    // do something
                //    return uptoken;
                // },
                get_new_uptoken: false,             // 设置上传文件的时候是否每次都重新获取新的uptoken
                // downtoken_url: '/downtoken',
                // Ajax请求downToken的Url，私有空间时使用，JS-SDK将向该地址POST文件的key和domain，服务端返回的JSON必须包含url字段，url值为该文件的下载地址
                unique_names: true,              // 默认false，key为文件名。若开启该选项，JS-SDK会为每个文件自动生成key（文件名）
                // save_key: true,                  // 默认false。若在服务端生成uptoken的上传策略中指定了sava_key，则开启，SDK在前端将不对key进行任何处理
                domain: 'http://dsyy.isart.me/',     // bucket域名，下载资源时用到，必需
                max_file_size: '100mb',             // 最大文件体积限制
                flash_swf_url: 'path/of/plupload/Moxie.swf',  //引入flash，相对路径
                max_retries: 3,                     // 上传失败最大重试次数
                dragdrop: true,                     // 开启可拖曳上传
                drop_element: 'container',          // 拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
                chunk_size: '4mb',                  // 分块上传时，每块的体积
                auto_start: true,                   // 选择文件后自动上传，若关闭需要自己绑定事件触发上传
                //x_vars : {
                //    查看自定义变量
                //    'time' : function(up,file) {
                //        var time = (new Date()).getTime();
                // do something with 'time'
                //        return time;
                //    },
                //    'size' : function(up,file) {
                //        var size = file.size;
                // do something with 'size'
                //        return size;
                //    }
                //},
                init: {
                    'FilesAdded': function (up, files) {
                        plupload.each(files, function (file) {
                            // 文件添加进队列后，处理相关的事情
//                                            alert(alert(JSON.stringify(file)));
                        });
                    },
                    'BeforeUpload': function (up, file) {
                        // 每个文件上传前，处理相关的事情
//                        console.log("BeforeUpload up:" + up + " file:" + JSON.stringify(file));
                    },
                    'UploadProgress': function (up, file) {
                        // 每个文件上传时，处理相关的事情
//                        console.log("UploadProgress up:" + up + " file:" + JSON.stringify(file));
                    },
                    'FileUploaded': function (up, file, info) {
                        // 每个文件上传成功后，处理相关的事情
                        // 其中info是文件上传成功后，服务端返回的json，形式如：
                        // {
                        //    "hash": "Fh8xVqod2MQ1mocfI4S4KpRL6D98",
                        //    "key": "gogopher.jpg"
                        //  }
//                        console.log(JSON.stringify(info));
                        var domain = up.getOption('domain');
                        var res = JSON.parse(info);
                        //获取上传成功后的文件的Url
                        var sourceLink = domain + res.key;
                        // $("#upload_file_0").val(sourceLink);
                        console.log(sourceLink);
                        $("#prv_image_0").attr('src', sourceLink);
                        $("#font_file_0").html('');
                    },
                    'Error': function (up, err, errTip) {
                        //上传出错时，处理相关的事情
                        console.log(err + errTip);
                    },
                    'UploadComplete': function () {
                        //队列文件处理完毕后，处理相关的事情
                    },
                    'Key': function (up, file) {
                        // 若想在前端对每个文件的key进行个性化处理，可以配置该函数
                        // 该配置必须要在unique_names: false，save_key: false时才生效

                        var key = "";
                        // do something with key here
                        return key
                    }
                }
            });
            var uploader_1 = Qiniu.uploader({
                runtimes: 'html5,flash,html4',      // 上传模式，依次退化
                browse_button: 'prv_image_1',         // 上传选择的点选按钮，必需
                container: 'container',//上传按钮的上级元素ID
                // 在初始化时，uptoken，uptoken_url，uptoken_func三个参数中必须有一个被设置
                // 切如果提供了多个，其优先级为uptoken > uptoken_url > uptoken_func
                // 其中uptoken是直接提供上传凭证，uptoken_url是提供了获取上传凭证的地址，如果需要定制获取uptoken的过程则可以设置uptoken_func
                uptoken: "{{$upload_token}}", // uptoken是上传凭证，由其他程序生成
                // uptoken_url: '/uptoken',         // Ajax请求uptoken的Url，强烈建议设置（服务端提供）
                // uptoken_func: function(file){    // 在需要获取uptoken时，该方法会被调用
                //    // do something
                //    return uptoken;
                // },
                get_new_uptoken: false,             // 设置上传文件的时候是否每次都重新获取新的uptoken
                // downtoken_url: '/downtoken',
                // Ajax请求downToken的Url，私有空间时使用，JS-SDK将向该地址POST文件的key和domain，服务端返回的JSON必须包含url字段，url值为该文件的下载地址
                unique_names: true,              // 默认false，key为文件名。若开启该选项，JS-SDK会为每个文件自动生成key（文件名）
                // save_key: true,                  // 默认false。若在服务端生成uptoken的上传策略中指定了sava_key，则开启，SDK在前端将不对key进行任何处理
                domain: 'http://dsyy.isart.me/',     // bucket域名，下载资源时用到，必需
                max_file_size: '100mb',             // 最大文件体积限制
                flash_swf_url: 'path/of/plupload/Moxie.swf',  //引入flash，相对路径
                max_retries: 3,                     // 上传失败最大重试次数
                dragdrop: true,                     // 开启可拖曳上传
                drop_element: 'container',          // 拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
                chunk_size: '4mb',                  // 分块上传时，每块的体积
                auto_start: true,                   // 选择文件后自动上传，若关闭需要自己绑定事件触发上传
                //x_vars : {
                //    查看自定义变量
                //    'time' : function(up,file) {
                //        var time = (new Date()).getTime();
                // do something with 'time'
                //        return time;
                //    },
                //    'size' : function(up,file) {
                //        var size = file.size;
                // do something with 'size'
                //        return size;
                //    }
                //},
                init: {
                    'FilesAdded': function (up, files) {
                        plupload.each(files, function (file) {
                            // 文件添加进队列后，处理相关的事情
//                                            alert(alert(JSON.stringify(file)));
                        });
                    },
                    'BeforeUpload': function (up, file) {
                        // 每个文件上传前，处理相关的事情
//                        console.log("BeforeUpload up:" + up + " file:" + JSON.stringify(file));
                    },
                    'UploadProgress': function (up, file) {
                        // 每个文件上传时，处理相关的事情
//                        console.log("UploadProgress up:" + up + " file:" + JSON.stringify(file));
                    },
                    'FileUploaded': function (up, file, info) {
                        // 每个文件上传成功后，处理相关的事情
                        // 其中info是文件上传成功后，服务端返回的json，形式如：
                        // {
                        //    "hash": "Fh8xVqod2MQ1mocfI4S4KpRL6D98",
                        //    "key": "gogopher.jpg"
                        //  }
//                        console.log(JSON.stringify(info));
                        var domain = up.getOption('domain');
                        var res = JSON.parse(info);
                        //获取上传成功后的文件的Url
                        var sourceLink = domain + res.key;
                        // $("#upload_file_1").val(sourceLink);
                        $("#prv_image_1").attr('src', sourceLink);
                        $("#font_file_1").html('');
                        // console.log($("#pickfiles").attr('src'));
                    },
                    'Error': function (up, err, errTip) {
                        //上传出错时，处理相关的事情
                        console.log(err + errTip);
                    },
                    'UploadComplete': function () {
                        //队列文件处理完毕后，处理相关的事情
                    },
                    'Key': function (up, file) {
                        // 若想在前端对每个文件的key进行个性化处理，可以配置该函数
                        // 该配置必须要在unique_names: false，save_key: false时才生效

                        var key = "";
                        // do something with key here
                        return key
                    }
                }
            });
            var uploader_2 = Qiniu.uploader({
                runtimes: 'html5,flash,html4',      // 上传模式，依次退化
                browse_button: 'prv_image_2',         // 上传选择的点选按钮，必需
                container: 'container',//上传按钮的上级元素ID
                // 在初始化时，uptoken，uptoken_url，uptoken_func三个参数中必须有一个被设置
                // 切如果提供了多个，其优先级为uptoken > uptoken_url > uptoken_func
                // 其中uptoken是直接提供上传凭证，uptoken_url是提供了获取上传凭证的地址，如果需要定制获取uptoken的过程则可以设置uptoken_func
                uptoken: "{{$upload_token}}", // uptoken是上传凭证，由其他程序生成
                // uptoken_url: '/uptoken',         // Ajax请求uptoken的Url，强烈建议设置（服务端提供）
                // uptoken_func: function(file){    // 在需要获取uptoken时，该方法会被调用
                //    // do something
                //    return uptoken;
                // },
                get_new_uptoken: false,             // 设置上传文件的时候是否每次都重新获取新的uptoken
                // downtoken_url: '/downtoken',
                // Ajax请求downToken的Url，私有空间时使用，JS-SDK将向该地址POST文件的key和domain，服务端返回的JSON必须包含url字段，url值为该文件的下载地址
                unique_names: true,              // 默认false，key为文件名。若开启该选项，JS-SDK会为每个文件自动生成key（文件名）
                // save_key: true,                  // 默认false。若在服务端生成uptoken的上传策略中指定了sava_key，则开启，SDK在前端将不对key进行任何处理
                domain: 'http://dsyy.isart.me/',     // bucket域名，下载资源时用到，必需
                max_file_size: '100mb',             // 最大文件体积限制
                flash_swf_url: 'path/of/plupload/Moxie.swf',  //引入flash，相对路径
                max_retries: 3,                     // 上传失败最大重试次数
                dragdrop: true,                     // 开启可拖曳上传
                drop_element: 'container',          // 拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
                chunk_size: '4mb',                  // 分块上传时，每块的体积
                auto_start: true,                   // 选择文件后自动上传，若关闭需要自己绑定事件触发上传
                //x_vars : {
                //    查看自定义变量
                //    'time' : function(up,file) {
                //        var time = (new Date()).getTime();
                // do something with 'time'
                //        return time;
                //    },
                //    'size' : function(up,file) {
                //        var size = file.size;
                // do something with 'size'
                //        return size;
                //    }
                //},
                init: {
                    'FilesAdded': function (up, files) {
                        plupload.each(files, function (file) {
                            // 文件添加进队列后，处理相关的事情
//                                            alert(alert(JSON.stringify(file)));
                        });
                    },
                    'BeforeUpload': function (up, file) {
                        // 每个文件上传前，处理相关的事情
//                        console.log("BeforeUpload up:" + up + " file:" + JSON.stringify(file));
                    },
                    'UploadProgress': function (up, file) {
                        // 每个文件上传时，处理相关的事情
//                        console.log("UploadProgress up:" + up + " file:" + JSON.stringify(file));
                    },
                    'FileUploaded': function (up, file, info) {
                        // 每个文件上传成功后，处理相关的事情
                        // 其中info是文件上传成功后，服务端返回的json，形式如：
                        // {
                        //    "hash": "Fh8xVqod2MQ1mocfI4S4KpRL6D98",
                        //    "key": "gogopher.jpg"
                        //  }
//                        console.log(JSON.stringify(info));
                        var domain = up.getOption('domain');
                        var res = JSON.parse(info);
                        //获取上传成功后的文件的Url
                        var sourceLink = domain + res.key;
                        // $("#upload_file_2").val(sourceLink);
                        $("#prv_image_2").attr('src', sourceLink);
                        $("#font_file_2").html('');
                        // console.log($("#pickfiles").attr('src'));
                    },
                    'Error': function (up, err, errTip) {
                        //上传出错时，处理相关的事情
                        console.log(err + errTip);
                    },
                    'UploadComplete': function () {
                        //队列文件处理完毕后，处理相关的事情
                    },
                    'Key': function (up, file) {
                        // 若想在前端对每个文件的key进行个性化处理，可以配置该函数
                        // 该配置必须要在unique_names: false，save_key: false时才生效

                        var key = "";
                        // do something with key here
                        return key
                    }
                }
            });
            var uploader_3 = Qiniu.uploader({
                runtimes: 'html5,flash,html4',      // 上传模式，依次退化
                browse_button: 'prv_image_3',         // 上传选择的点选按钮，必需
                container: 'container',//上传按钮的上级元素ID
                // 在初始化时，uptoken，uptoken_url，uptoken_func三个参数中必须有一个被设置
                // 切如果提供了多个，其优先级为uptoken > uptoken_url > uptoken_func
                // 其中uptoken是直接提供上传凭证，uptoken_url是提供了获取上传凭证的地址，如果需要定制获取uptoken的过程则可以设置uptoken_func
                uptoken: "{{$upload_token}}", // uptoken是上传凭证，由其他程序生成
                // uptoken_url: '/uptoken',         // Ajax请求uptoken的Url，强烈建议设置（服务端提供）
                // uptoken_func: function(file){    // 在需要获取uptoken时，该方法会被调用
                //    // do something
                //    return uptoken;
                // },
                get_new_uptoken: false,             // 设置上传文件的时候是否每次都重新获取新的uptoken
                // downtoken_url: '/downtoken',
                // Ajax请求downToken的Url，私有空间时使用，JS-SDK将向该地址POST文件的key和domain，服务端返回的JSON必须包含url字段，url值为该文件的下载地址
                unique_names: true,              // 默认false，key为文件名。若开启该选项，JS-SDK会为每个文件自动生成key（文件名）
                // save_key: true,                  // 默认false。若在服务端生成uptoken的上传策略中指定了sava_key，则开启，SDK在前端将不对key进行任何处理
                domain: 'http://dsyy.isart.me/',     // bucket域名，下载资源时用到，必需
                max_file_size: '100mb',             // 最大文件体积限制
                flash_swf_url: 'path/of/plupload/Moxie.swf',  //引入flash，相对路径
                max_retries: 3,                     // 上传失败最大重试次数
                dragdrop: true,                     // 开启可拖曳上传
                drop_element: 'container',          // 拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
                chunk_size: '4mb',                  // 分块上传时，每块的体积
                auto_start: true,                   // 选择文件后自动上传，若关闭需要自己绑定事件触发上传
                //x_vars : {
                //    查看自定义变量
                //    'time' : function(up,file) {
                //        var time = (new Date()).getTime();
                // do something with 'time'
                //        return time;
                //    },
                //    'size' : function(up,file) {
                //        var size = file.size;
                // do something with 'size'
                //        return size;
                //    }
                //},
                init: {
                    'FilesAdded': function (up, files) {
                        plupload.each(files, function (file) {
                            // 文件添加进队列后，处理相关的事情
//                                            alert(alert(JSON.stringify(file)));
                        });
                    },
                    'BeforeUpload': function (up, file) {
                        // 每个文件上传前，处理相关的事情
//                        console.log("BeforeUpload up:" + up + " file:" + JSON.stringify(file));
                    },
                    'UploadProgress': function (up, file) {
                        // 每个文件上传时，处理相关的事情
//                        console.log("UploadProgress up:" + up + " file:" + JSON.stringify(file));
                    },
                    'FileUploaded': function (up, file, info) {
                        // 每个文件上传成功后，处理相关的事情
                        // 其中info是文件上传成功后，服务端返回的json，形式如：
                        // {
                        //    "hash": "Fh8xVqod2MQ1mocfI4S4KpRL6D98",
                        //    "key": "gogopher.jpg"
                        //  }
//                        console.log(JSON.stringify(info));
                        var domain = up.getOption('domain');
                        var res = JSON.parse(info);
                        //获取上传成功后的文件的Url
                        var sourceLink = domain + res.key;
                        // $("#upload_file_3").val(sourceLink);
                        $("#prv_image_3").attr('src', sourceLink);
                        $("#font_file_3").html('');
                        // console.log($("#pickfiles").attr('src'));
                    },
                    'Error': function (up, err, errTip) {
                        //上传出错时，处理相关的事情
                        console.log(err + errTip);
                    },
                    'UploadComplete': function () {
                        //队列文件处理完毕后，处理相关的事情
                    },
                    'Key': function (up, file) {
                        // 若想在前端对每个文件的key进行个性化处理，可以配置该函数
                        // 该配置必须要在unique_names: false，save_key: false时才生效

                        var key = "";
                        // do something with key here
                        return key
                    }
                }
            });
            var uploader_4 = Qiniu.uploader({
                runtimes: 'html5,flash,html4',      // 上传模式，依次退化
                browse_button: 'prv_image_4',         // 上传选择的点选按钮，必需
                container: 'container',//上传按钮的上级元素ID
                // 在初始化时，uptoken，uptoken_url，uptoken_func三个参数中必须有一个被设置
                // 切如果提供了多个，其优先级为uptoken > uptoken_url > uptoken_func
                // 其中uptoken是直接提供上传凭证，uptoken_url是提供了获取上传凭证的地址，如果需要定制获取uptoken的过程则可以设置uptoken_func
                uptoken: "{{$upload_token}}", // uptoken是上传凭证，由其他程序生成
                // uptoken_url: '/uptoken',         // Ajax请求uptoken的Url，强烈建议设置（服务端提供）
                // uptoken_func: function(file){    // 在需要获取uptoken时，该方法会被调用
                //    // do something
                //    return uptoken;
                // },
                get_new_uptoken: false,             // 设置上传文件的时候是否每次都重新获取新的uptoken
                // downtoken_url: '/downtoken',
                // Ajax请求downToken的Url，私有空间时使用，JS-SDK将向该地址POST文件的key和domain，服务端返回的JSON必须包含url字段，url值为该文件的下载地址
                unique_names: true,              // 默认false，key为文件名。若开启该选项，JS-SDK会为每个文件自动生成key（文件名）
                // save_key: true,                  // 默认false。若在服务端生成uptoken的上传策略中指定了sava_key，则开启，SDK在前端将不对key进行任何处理
                domain: 'http://dsyy.isart.me/',     // bucket域名，下载资源时用到，必需
                max_file_size: '100mb',             // 最大文件体积限制
                flash_swf_url: 'path/of/plupload/Moxie.swf',  //引入flash，相对路径
                max_retries: 3,                     // 上传失败最大重试次数
                dragdrop: true,                     // 开启可拖曳上传
                drop_element: 'container',          // 拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
                chunk_size: '4mb',                  // 分块上传时，每块的体积
                auto_start: true,                   // 选择文件后自动上传，若关闭需要自己绑定事件触发上传
                //x_vars : {
                //    查看自定义变量
                //    'time' : function(up,file) {
                //        var time = (new Date()).getTime();
                // do something with 'time'
                //        return time;
                //    },
                //    'size' : function(up,file) {
                //        var size = file.size;
                // do something with 'size'
                //        return size;
                //    }
                //},
                init: {
                    'FilesAdded': function (up, files) {
                        plupload.each(files, function (file) {
                            // 文件添加进队列后，处理相关的事情
//                                            alert(alert(JSON.stringify(file)));
                        });
                    },
                    'BeforeUpload': function (up, file) {
                        // 每个文件上传前，处理相关的事情
//                        console.log("BeforeUpload up:" + up + " file:" + JSON.stringify(file));
                    },
                    'UploadProgress': function (up, file) {
                        // 每个文件上传时，处理相关的事情
//                        console.log("UploadProgress up:" + up + " file:" + JSON.stringify(file));
                    },
                    'FileUploaded': function (up, file, info) {
                        // 每个文件上传成功后，处理相关的事情
                        // 其中info是文件上传成功后，服务端返回的json，形式如：
                        // {
                        //    "hash": "Fh8xVqod2MQ1mocfI4S4KpRL6D98",
                        //    "key": "gogopher.jpg"
                        //  }
//                        console.log(JSON.stringify(info));
                        var domain = up.getOption('domain');
                        var res = JSON.parse(info);
                        //获取上传成功后的文件的Url
                        var sourceLink = domain + res.key;
                        // $("#upload_file_4").val(sourceLink);
                        $("#prv_image_4").attr('src', sourceLink);
                        $("#font_file_4").html('');
                        // console.log($("#pickfiles").attr('src'));
                    },
                    'Error': function (up, err, errTip) {
                        //上传出错时，处理相关的事情
                        console.log(err + errTip);
                    },
                    'UploadComplete': function () {
                        //队列文件处理完毕后，处理相关的事情
                    },
                    'Key': function (up, file) {
                        // 若想在前端对每个文件的key进行个性化处理，可以配置该函数
                        // 该配置必须要在unique_names: false，save_key: false时才生效

                        var key = "";
                        // do something with key here
                        return key
                    }
                }
            });
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
    </script>
@endsection