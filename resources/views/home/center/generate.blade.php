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
                        <input type="hidden" id="time_type" name="time_type" value="{{$time_type_search?$time_type_search:''}}" />
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
                        <input type="hidden" id="version" name="version" value="{{$version_search?$version_search:''}}" />
                    </div>
                    <div class="col-xs-3 col-sm-3 text-right padding-0">
                        <span class="width-100 height-100 border-right"></span>
                    </div>
                </div>
                <input name="page" id="page" type="hidden" value="{{$purchases['page_number']}}" />
                <div class="col-xs-6 col-sm-6 float-left">
                    <input type="text" name="search" class="form-control border-0 width-90 float-left" style="border-radius:0;border-bottom:1px solid #989898;box-shadow:none;" placeholder="请输入国家或者城市查询" value="{{$search?$search:''}}" />
                    <a href="javascript:" class="width-10 float-left bg-none border-0" style="border:0;box-shadow: none;" onclick="submitForm()">
                        <img src="{{URL::asset('img/search_03.png')}}" style="border:0;box-shadow: none;" class="height-40px"  />
                    </a>
                </div>
            </div>
            </form>
        </div>
        <div class="clear"></div>
        <div class="table-responsive">
            <table class="table border-0 font-size-10">
                <thead>
                    <tr class=" bg-lime-grey">
                        <th class="text-center" width="10px">选择</th>
                        <th class="text-center" width="50px">序号</th>
                        <th class="text-center" width="100px">类型</th>
                        <th class="text-center" width="100px">生成时间</th>
                        <th class="text-center" width="100px">失效时间</th>
                        <th class="text-center" width="50px">流量</th>
                        <th class="text-center" width="120px">国家/城市</th>
                        <th class="text-center" width="30px">logo</th>
                        <th class="text-center" width="30px">文字</th>
                        <th class="text-center" width="200px">地址</th>
                        <th class="text-center" width="200px">操作</th>
                    </tr>
                </thead>
                <tbody>
                @if($purchases)
                    @foreach($purchases['results'] as $purchas)
                        <tr>
                            <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">
                                <input type="checkbox" class="checkSingle" name="id_array" value="{{$purchas['id']}}" />
                            </td>
                            <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">{{$purchas['id']}}</td>
                            <td class="text-center font-color-red" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">{{$purchas['version']['name']}}</td>
                            <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">{{date('Y/m/d',strtotime($purchas['create_time']))}}</td>
                            <td class="text-center overflow-x-scroll" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">{{date('Y/m/d',strtotime($purchas['expire_time']))}}</td>
                            <td class="text-center overflow-x-scroll" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">{{$purchas['viewed_count']}}</td>
                            <td class="text-center overflow-x-scroll" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">{{$purchas['item_pname']}}/{{$purchas['item_name']}}</td>
                            <td class="text-center overflow-x-scroll" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">
                                <img src="{{$purchas['viewed_count']}}" class="width-30px height-30px" />
                            </td>
                            <td class="text-center overflow-x-scroll" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">{{$purchas['slogan']}}</td>
                            <td class="text-center font-color-blue width-200px" width="200px" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">
                                <a href="{{$purchas['url']}}" style="display: inline;" target="_blank">
                                    {{$purchas['url']}}
                                </a>
                            </td>
                            <td class="text-center" style="border-bottom: 1px #F2F2F2 solid;">
                                <button type="button" class="btn bg-grey-btn font-size-10 padding-left-5 padding-right-5 margin-top-5 margin-bottom-5" style="border-radius: 0;" onclick="downloadQrcode('{{$purchas['id']}}')">下载二维码</button>
                                <button type="button" class="btn bg-grey-btn font-size-10 padding-left-5 padding-right-5" style="border-radius: 0;" id="copy_{{$purchas['id']}}" onclick="copy('{{$purchas['id']}}')" data-clipboard-text="{{$purchas['url']}}">复制地址</button>
                            </td>
                        </tr>
                    @endforeach
                    @if($purchases['count']==0)
                        <tr>
                            <td class="text-center" colspan="11">没有数据</td>
                        </tr>
                    @endif
                @endif
                </tbody>
            </table>
        </div>
        <dive>
            @if($purchases&&$purchases['page_count']>1)
                <div class="paging-div margin-auto" >
                    <div class="tcdPageCode float-left"></div>
                    <div class="dropdown float-left text-center jumpSelect" style="display:inline;">
                        <a href="javascript:" id="paging" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            选择页码<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu overflow-y-scroll" aria-labelledby="paging" style="min-width: 100px;max-height: 260px;">
                            @for($i=1;$i<=$purchases['page_count'];$i++)
                                <li class="text-center"><a href="javascript:" onclick="jumpPage({{$i}})">{{$i}}</a></li>
                            @endfor
                        </ul>
                    </div>
                </div>
            @endif
        </dive>
        <div class="clear"></div>
        @if($purchases&&$purchases['count']>0)
        <div class="package-card margin-bottom-20 margin-top-20">
            <div class="card-div height-50px padding-left-10 padding-right-10">
                <div class="float-left line-height-50">
                    <input type="checkbox" class="checkAll" id="checkall"  />
                </div>
                <div class="float-right line-height-45">
                    <button class="btn bg-red font-color-white margin-right-20" type="button" style="border-radius: 0; color:#fff;">批量下载二维码</button>
                    <button class="btn font-color-red bg-none border border-red" type="button" onclick="delMore()" style="border-radius: 0; color: #E21B14;">批量删除</button>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{ URL::asset('/js/jquery.page.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/clipboard.min.js') }}"></script>
<script>
    $(function(){
        //分页
        $(".tcdPageCode").createPage({
            pageCount:'{{$purchases['page_count']}}',
            current:'{{$purchases['page_number']}}',
            backFn:function(p){
                console.log(p);
                $('#page').val(p)
                $('#generate-form').submit();
            }
        });
        var tcdPageCodeWidth=$('.tcdPageCode').width();
        var jumpSelectWidth=$('.jumpSelect').width();
        var pagingWidth=tcdPageCodeWidth+jumpSelectWidth+100;
        $('.paging-div').width(pagingWidth)
    })
    function jumpPage(page){
        $('#page').val(page)
        $('#generate-form').submit();
    }
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
    //批量删除
    function delMore(){
        var id_array=''
        $("input:checkbox[name='id_array']:checked").each(function() {
            id_array=id_array+$(this).val()+',';  // 每一个被选中项的值
        });
        id_array=id_array.substring(0,id_array.length-1)
        var param = {
            ids: id_array,
            _token: "{{ csrf_token() }}"
        }
        if(id_array){
            delMorePurchase('{{URL::asset('')}}', param, function (ret) {
                console.log('delMorePurchase is : '+JSON.stringify(ret))
                if (ret.result == true) {
                    layer.msg('删除成功', {icon: 1, time: 1000});
                    window.location.reload();
                } else {
                    layer.msg('删除失败', {icon: 2, time: 2000})
                }
            })
        }
        else{
            layer.msg('请选择要删除的数据', {icon: 2, time: 2000})
        }
    }
    //复制
    function copy(id){
        var clipboard = new Clipboard('#copy_'+id);
        clipboard.on('success', function(e) {
            // console.log(e);
            layer.msg('复制成功', {icon: 1, time: 2000})
        });
        clipboard.on('error', function(e) {
            // console.log(e);
            layer.msg('复制失败，请扫描图中二维码', {icon: 2, time: 2000})
        });
    }
    //下载二维码
    function downloadQrcode(id){
        var param={
            id:id,
            _token: "{{ csrf_token() }}"
        }
        downloadQrcodeDo('{{URL::asset('')}}', param, function (ret) {
            $('#test').html(ret['responseText'])
            console.log('getCountry err is :' +JSON.stringify(ret))
            // if (ret.result == true) {
            // } else {
            //     console.log('getCountry err is :' +JSON.stringify(ret.message))
            // }
        })
    }
</script>
@endsection