@extends('admin.layouts.app')

@section('content')
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 订单管理 <span class="c-gray en">&gt;</span>订单列表 <a class="btn btn-success radius btn-refresh r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" onclick="location.replace('{{URL::asset('/admin/order/index')}}');" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="text-c">
        <form action="{{URL::asset('/admin/order/index')}}" method="post" class="form-horizontal" id="form">
            <input type="hidden" name="page" id="page" value="{{$page}}" />
            {{csrf_field()}}
            <span class="select-box" style="width:150px;">
              <select class="select" size="1" name="version" id="version">
                  <option value=""  >全部</option>
                  @foreach($versions_array['results'] as $version_array)
                      <option value="{{$version_array['code']}}" {{$version_array['code']==$version?'selected':''}}>{{$version_array['name']}}</option>
                  @endforeach
              </select>
            </span>
            <input id="search" name="search" type="text" class="input-text" value="{{$search?$search:''}}" style="width:350px" placeholder="用户ID/用户名">
            <button type="submit" class="btn btn-success" id="" name="">
                <i class="Hui-iconfont">&#xe665;</i> 搜索
            </button>
        </form>
    </div>
    <from action="{{URL::asset('/admin/order/export')}}" method="post"  class="form-horizontal">
        <div class="cl pd-5 bg-1 bk-gray mt-20">
            <span class="l">
                <a href="javascript:;" onclick="exportMember()" class="btn btn-danger radius"> 批量导出订单</a>
            </span>
        </div>
        <div class="mt-20">
            <table class="table table-border table-bordered table-bg table-hover table-sort" id="table-sort">
                <thead>
                <tr class="text-c">
                    <th>
                        <input type="checkbox" class="checkAll" id="checkall" />
                    </th>
                    <th>订单</th>
                    <th>用户</th>
                    <th>城市数量</th>
                    <th>版本类型</th>
                    <th>金额</th>
                    <th>时间</th>
                </tr>
                </thead>
                <tbody>
                @foreach($datas['results'] as $data)
                    <tr class="text-c">
                        <td>
                            <input type="checkbox" name="id_array" class="checkSingle" value="{{$data['out_trade_no']}}" />
                        </td>
                        <td>{{$data['out_trade_no']}}</td>
                        <td>{{$data['user']['username']}}</td>
                        <td>{{$data['city_count']}}</td>
                        <td>{{$data['version']['name']}}</td>
                        <td>{{$data['version']['name']}}</td>
                        <td>{{$data['amount_display']}}元</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if($datas&&$datas['page_count']>1)
                <div class="paging-div margin-auto" >
                    <div class="tcdPageCode"></div>
                </div>
            @endif
        </div>
    </from>
</div>

@endsection

@section('script')
<script type="text/javascript" src="{{ URL::asset('/js/jquery.page.js') }}"></script>
<script type="text/javascript">
    $(function(){
        //分页
        $(".tcdPageCode").createPage({
            pageCount:'{{$datas['page_count']}}',
            current:'{{$page}}',
            backFn:function(p){
                console.log(p);
                $('#page').val(p)
                $('#form').submit();
            }
        });
        $('#version').change(function(){
            $('#page').val(1)
        });
        $('#search').change(function(){
            $('#page').val(1)
        });


        var tcdPageCodeWidth=$('.tcdPageCode').width();
        var jumpSelectWidth=$('.jumpSelect').width();
        var pagingWidth=tcdPageCodeWidth+jumpSelectWidth+100;
        $('.paging-div').width(pagingWidth)
    })
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
    var checknum = $(".checkSingle").size();
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
    //批量导出订单
    function exportMember(){
        var id_array=''
        $("input:checkbox[name='id_array']:checked").each(function() { // 遍历name=test的多选框
            id_array=id_array+$(this).val()+',';  // 每一个被选中项的值
        });
        id_array=id_array.substring(0,id_array.length-1)
        if(id_array){
            $.ajax({
                url: '{{$url}}payment/exportOrder/',
                method: 'POST',
                data:{
                    ids:id_array
                },
                xhrFields: {
                    responseType: 'blob'
                },
                beforeSend: function (xhr) {
                    {{--xhr.setRequestHeader("Authorization", "Token {{$admin['token']}}");--}}
                    xhr.setRequestHeader("Authorization", "Token a00b0568ebca7dad489c178c4711eeb1d30e22cf");
                },
                success: function (data) {
                    var a = document.createElement('a');
                    var url = window.URL.createObjectURL(data);
                    a.href = url;
                    a.download = '订单信息.xls';
                    a.click();
                    window.URL.revokeObjectURL(url);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log('XMLHttpRequest is : '+JSON.stringify(XMLHttpRequest))
                    // 状态码
                    console.log(XMLHttpRequest.status);
                    // 状态
                    console.log(XMLHttpRequest.readyState);
                    // 错误信息
                    console.log(textStatus);
                }
            });
        }
        else{
            layer.msg('请选择要导出的信息', {icon: 2, time: 2000})
        }
    }
</script>
@endsection