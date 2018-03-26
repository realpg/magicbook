@extends('home.layouts.base')

@section('content')
<div id="main-body">
    <div class="container margin-top-100">
        @include('home.layouts.center')
        <div class="width-100 text-center padding-5">
            <form id="generate-form" method="get">
                <div class="line-height-40">
                <div class="col-xs-3 col-sm-3 float-left font-size-16">
                    <div class="col-xs-9 col-sm-9 text-right padding-0">
                        <a href="#" class="dropdown-toggle font-color-black" style="text-decoration:none;color:#000;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            @if($time_type_search)
                                @foreach($time_types as $time_type)
                                    @if($time_type['day']==$time_type_search)
                                    <span id="c_time_type">{{$time_type['name']}}</span> <img src="{{URL::asset('img/xuanxiangka_03.png')}}" class="width-35px vertical-align-middle" />
                                    @endif
                                @endforeach
                            @else
                                <span id="c_time_type">按时间选择</span> <img src="{{URL::asset('img/xuanxiangka_03.png')}}" class="width-35px vertical-align-middle" />
                            @endif
                        </a>
                        <ul class="dropdown-menu width-100" id="countries-content">
                            <li class="padding-right-10 text-center" onclick="choiceTimeType('','全部')" style="cursor:pointer;">全部</li>
                            @foreach($time_types as $time_type)
                                <li class="padding-right-10 text-center" onclick="choiceTimeType('{{$time_type['day']}}','{{$time_type['name']}}')" style="cursor:pointer;">{{$time_type['name']}}</li>
                            @endforeach
                        </ul>
                        <input type="hidden" id="time_type" name="time_type" />
                    </div>
                    <div class="col-xs-3 col-sm-3 text-right padding-0">
                        <span class="width-100 height-100 border-right"></span>
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 float-left font-size-16">
                    <div class="col-xs-9 col-sm-9 text-right padding-0">
                        <a href="#" class="dropdown-toggle font-color-black" style="text-decoration:none;color:#000;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            @if($version_search)
                                @foreach($versions['results'] as $version)
                                    @if($version['code']==$version_search)
                                        <span id="c_version">{{$version['name']}}</span> <img src="{{URL::asset('img/xuanxiangka_03.png')}}" class="width-35px vertical-align-middle" />
                                    @endif
                                @endforeach
                            @else
                                <span id="c_version">按时间选择</span> <img src="{{URL::asset('img/xuanxiangka_03.png')}}" class="width-35px vertical-align-middle" />
                            @endif
                        </a>
                        @if($versions)
                            <ul class="dropdown-menu width-100" id="countries-content">
                                <li class="padding-right-10 text-center" onclick="choiceVersion('','全部')" style="cursor:pointer;">全部</li>
                                @foreach($versions['results'] as $version)
                                    <li class="padding-right-10 text-center" onclick="choiceVersion('{{$version['code']}}','{{$version['name']}}')" style="cursor:pointer;">{{$version['name']}}</li>
                                @endforeach
                            </ul>
                        @endif
                        <input type="hidden" id="version" name="version" />
                    </div>
                    <div class="col-xs-3 col-sm-3 text-right padding-0">
                        <span class="width-100 height-100 border-right"></span>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 float-left">
                    <input type="text" name="search" class="form-control border-0 width-90 float-left" style="border-radius:0;border-bottom:1px solid #989898;box-shadow:none;" placeholder="{{$search?$search:'请输入国家或者城市查询'}}" />
                    <a href="javascript:" class="width-10 float-left bg-none border-0" style="border:0;box-shadow: none;" onclick="submitForm()">
                        <img src="{{URL::asset('img/search_03.png')}}" style="border:0;box-shadow: none;" class="height-40px"  />
                    </a>
                </div>
            </div>
            </form>
        </div>
        <div class="clear"></div>
        <div class="table-responsive">
            <table class="table border-0">
                <thead>
                    <tr class=" bg-lime-grey">
                        <th class="text-center">选择</th>
                        <th class="text-center">序号</th>
                        <th class="text-center">类型</th>
                        <th class="text-center">生成时间</th>
                        <th class="text-center">失效时间</th>
                        <th class="text-center">流量</th>
                        <th class="text-center">国家/城市</th>
                        <th class="text-center">logo</th>
                        <th class="text-center">文字</th>
                        <th class="text-center">地址</th>
                        <th class="text-center">操作</th>
                    </tr>
                </thead>
                <tbody>
                @if($purchases)
                    @foreach($purchases['results'] as $purchas)
                        <tr>
                            <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">
                                <input type="checkbox" class="checkSingle" name="id_array" />
                            </td>
                            <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">{{$purchas['id']}}</td>
                            <td class="text-center font-color-red" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">{{$purchas['version']['name']}}</td>
                            <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">2018/05/11</td>
                            <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">2018/05/11</td>
                            <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">{{$purchas['viewed_count']}}</td>
                            <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">{{$purchas['item_pname']}}/{{$purchas['item_name']}}</td>
                            <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">
                                <img src="{{$purchas['viewed_count']}}" class="width-28px height-28px" />
                            </td>
                            <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">{{$purchas['slogan']}}</td>
                            <td class="text-center font-color-blue" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">
                                <a href="{{$purchas['url']}}" target="_blank">
                                    {{$purchas['url']}}
                                </a>
                            </td>
                            <td class="text-center" style="border-bottom: 1px #F2F2F2 solid;">
                                <button type="button" class="btn bg-grey-btn" style="border-radius: 0;">下载二维码</button>
                                <button type="button" class="btn bg-grey-btn" style="border-radius: 0;">复制地址</button>
                            </td>
                        </tr>
                    @endforeach
                @endif
                @if(!$purchases)
                    <tr>
                        <td class="text-center" colspan="11">没有数据</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        @if($purchases)
        <div class="package-card">
            <div class="card-div height-50px padding-left-10 padding-right-10">
                <div class="float-left line-height-50">
                    <input type="checkbox" class="checkAll" id="checkall" />
                </div>
                <div class="float-right line-height-45">
                    <button class="btn bg-red font-color-white margin-right-20" type="button" style="border-radius: 0; color:#fff;">批量下载二维码</button>
                    <button class="btn font-color-red bg-none border border-red" type="button" style="border-radius: 0; color: #E21B14;">批量删除</button>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@section('script')
    <script>
        function choiceTimeType(day,name){
            $('#time_type').val(day);
            $('#c_time_type').text(name);
        }
        function choiceVersion(code,name){
            $('#version').val(code);
            $('#c_version').text(name);
        }
        function submitForm(){
            $('#generate-form').submit();
        }
        //全选
        $(".checkAll").click(function () {
            if ($(this).is(":checked") == true) {
                $("input[class=checkSingle]").each(function (h) {
                    $(this).prop("checked",true);
                    // $(this).parent().parent().css("background-color","#E3EFFA");
                    $(this).parent().parent().addClass("background-light"); //选中状态高亮
                });
            }else {
                $("input[class=checkSingle]").each(function (h) {
                    $(this).prop("checked",false);
                    // $(this).parent().parent().css("background-color","#ffffff");
                    $(this).parent().parent().removeClass("background-light");
                });
            }
            statistics()
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
            statistics()
        });
        //批量删除
        function cart_delMore(){
            var id_array=''
            $("input:checkbox[name='id_array']:checked").each(function() { // 遍历name=test的多选框
                id_array=id_array+$(this).val()+',';  // 每一个被选中项的值
            });
            id_array=id_array.substring(0,id_array.length-1)
            var param = {
                id_array: id_array,
                _token: "{{ csrf_token() }}"
            }
            if(id_array){
                delMoreShoppingCart('{{URL::asset('')}}', param, function (ret) {
                    if (ret.result == true) {
                        layer.msg(ret.msg, {icon: 1, time: 1000});
                        window.location.reload()
                    } else {
                        layer.msg(ret.msg, {icon: 2, time: 2000})
                    }
                })
            }
            else{
                layer.msg('请选择要删除的商品', {icon: 2, time: 2000})
            }
        }
    </script>
@endsection