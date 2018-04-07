@extends('admin.layouts.app')

@section('content')
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 试听管理 <span class="c-gray en">&gt;</span>试听列表 <a class="btn btn-success radius btn-refresh r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" onclick="location.replace('{{URL::asset('/admin/audition/index')}}');" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="text-c">
        <form action="{{URL::asset('/admin/audition/index')}}" method="post" class="form-horizontal" id="form">
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
            <span class="select-box" style="width:150px;">
              <select class="select" size="1" name="view_order" id="view_order">
                  <option value="1" {{$view_order==1?'selected':''}} >浏览量从高到低</option>
                  <option value="-1" {{$view_order==-1?'selected':''}} >浏览量从低到高</option>
              </select>
            </span>
            <input id="search" name="search" type="text" class="input-text" value="{{$search?$search:''}}" style="width:200px" placeholder="用户ID/用户名/城市名称">
            <button type="submit" class="btn btn-success" id="" name="">
                <i class="Hui-iconfont">&#xe665;</i> 搜索
            </button>
        </form>
    </div>
    <from action="{{URL::asset('/admin/member/export')}}" method="post"  class="form-horizontal">
        <div class="cl pd-5 bg-1 bk-gray mt-20">
            <span class="l">
                <a href="javascript:;" onclick="delMore()" class="btn btn-danger radius"> 批量删除</a>
            </span>
        </div>
        <div class="mt-20">
            <table class="table table-border table-bordered table-bg table-hover table-sort" id="table-sort">
                <thead>
                <tr class="text-c">
                    <th>
                        <input type="checkbox" class="checkAll" id="checkall" />
                    </th>
                    <th width="80">ID</th>
                    <th>用户名</th>
                    <th>版本</th>
                    <th>流量</th>
                    <th>下载量</th>
                    <th>国家/城市</th>
                    <th>logo</th>
                    <th>文字</th>
                    <th width="100">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($datas['results'] as $data)
                    <tr class="text-c">
                        <td>
                            <input type="checkbox" name="id_array" class="checkSingle" value="{{$data['id']}}" />
                        </td>
                        <td>{{$data['id']}}</td>
                        <td>{{$data['user']['username']}}</td>
                        <td>{{$data['version']['name']}}</td>
                        <td>{{$data['viewed_count']}}</td>
                        <td>{{$data['download_count']}}</td>
                        <td>{{$data['item_pname']}}/{{$data['item_name']}}</td>
                        @if($data['version']['code']=='custom'&&$data['logo'])
                            <td><img src="{{$data['logo']}}" width="50px" /></td>
                        @else
                            <td>无</td>
                        @endif
                        <td>{{$data['slogan']?$data['slogan']:'无'}}</td>
                        <td class="td-manage">
                            <a title="下载二维码" href="javascript:;" onclick="downloadQrcode({{$data['id']}})" class="ml-5" style="text-decoration:none">
                                <i class="Hui-iconfont">&#xe695;</i>
                            </a>
                        </td>
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
        $('#view_order').change(function(){
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
    //批量删除
    function delMore(){
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
            delMoreAudition('{{URL::asset('')}}', param, function (ret) {
                console.log('delMoreAudition ret is :'+JSON.stringify(ret))
                if (ret.result == true) {
                    layer.msg(ret.message, {icon: 1, time: 1000});
                    $('.btn-refresh').click();
                } else {
                    layer.msg(ret.message, {icon: 2, time: 2000})
                }
            })
        }
        else{
            layer.msg('请选择要删除的信息', {icon: 2, time: 2000})
        }
    }
    //下载二维码
    function downloadQrcode(id){
        $.ajax({
            url: 'http://testlushu.gowithtommy.com/api/payment/downloadQrcode/?id='+id,
            method: 'POST',
            xhrFields: {
                responseType: 'blob'
            },
            beforeSend: function (xhr) {
                xhr.setRequestHeader("Authorization", "Token {{$admin['token']}}");
            },
            success: function (data) {
                var a = document.createElement('a');
                var url = window.URL.createObjectURL(data);
                a.href = url;
                a.download = setName()+'.png';
                a.click();
                window.URL.revokeObjectURL(url);
            }
        });
    }
</script>
@endsection