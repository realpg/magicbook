@extends('home.layouts.base')

@section('content')
<div id="main-body">
    <div class="container margin-top-100">
        @include('home.layouts.center')
        <div class="width-100 text-center padding-5">
            <form id="consumption-form" method="get">
                <div class="line-height-40">
                    <div class="col-xs-4 col-sm-4 float-left font-size-16 padding-top-5 padding-bottom-5">
                        <div class="">
                            <div class="col-xs-9 col-sm-9 text-right padding-0">
                                <a href="#" class="dropdown-toggle font-color-black" style="text-decoration:none;color:#000;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    @if($version_search)
                                        @foreach($versions['results'] as $version)
                                            @if($version['code']==$version_search)
                                                <span id="c_version">{{$version['name']}}</span> <img src="{{URL::asset('img/xuanxiangka_03.png')}}" class="width-35px vertical-align-middle" />
                                            @endif
                                        @endforeach
                                    @else
                                        <span id="c_version">按版本选择</span> <img src="{{URL::asset('img/xuanxiangka_03.png')}}" class="width-35px vertical-align-middle" />
                                    @endif
                                </a>
                                @if($versions)
                                    <ul class="dropdown-menu width-70" style="margin-left:30%;" id="countries-content">
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
                    </div>
                    <div class="col-xs-8 col-sm-8 float-left">
                        <input name="page" id="page" type="hidden" value="{{$page}}" />
                        <input type="text" name="search" class="form-control border-0 width-90 float-left" style="border-radius:0;border-bottom:1px solid #989898;box-shadow:none;" placeholder="请输入订单号查询" value="{{$search?$search:''}}" />
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
                        <th class="text-center">订单</th>
                        <th class="text-center">时间</th>
                        <th class="text-center">城市数量</th>
                        <th class="text-center">版本类型</th>
                        <th class="text-center">金额（元）</th>
                    </tr>
                </thead>
                <tbody>
                @if($orders)
                    @foreach($orders['results'] as $order)
                        <tr>
                            <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">{{$order['out_trade_no']}}</td>
                            <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">{{$order['pay_time']}}</td>
                            <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">{{$order['city_count']}}</td>
                            <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">{{$order['version']['name']}}</td>
                            <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">{{$order['version']['price']}}元</td>
                        </tr>
                    @endforeach
                    @if($orders['count']==0)
                        <tr>
                            <td class="text-center" colspan="5">没有数据</td>
                        </tr>
                    @endif
                @endif
                </tbody>
            </table>
        </div>
        @if($orders['count']>1)
            <div class="paging-div margin-auto" >
                <div class="tcdPageCode float-left"></div>
                <div class="dropdown float-left text-center jumpSelect" style="display:inline;">
                    <a href="javascript:" id="paging" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        选择页码<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="paging" style="min-width: 100px;">
                        @for($i=1;$i<=$orders['count'];$i++)
                            <li class="text-center"><a href="javascript:" onclick="jumpPage({{$i}})">{{$i}}</a></li>
                        @endfor
                    </ul>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{ URL::asset('/js/jquery.page.js') }}"></script>
<script>
    $(function(){
        //分页
        $(".tcdPageCode").createPage({
            pageCount:'{{$orders['count']}}',
            current:'{{$page}}',
            backFn:function(p){
                console.log(p);
                $('#page').val(p)
                $('#consumption-form').submit();
            }
        });
        var tcdPageCodeWidth=$('.tcdPageCode').width();
        var jumpSelectWidth=$('.jumpSelect').width();
        var pagingWidth=tcdPageCodeWidth+jumpSelectWidth+100;
        $('.paging-div').width(pagingWidth)
    })

    function choiceVersion(code,name){
        $('#version').val(code);
        $('#c_version').text(name);
    }
    function submitForm(){
        $('#page').val(1)
        $('#consumption-form').submit();
    }
    function jumpPage(page){
        $('#page').val(page)
        $('#consumption-form').submit();
    }
</script>
@endsection