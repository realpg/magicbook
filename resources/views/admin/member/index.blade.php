@extends('admin.layouts.app')

@section('content')
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户管理 <span class="c-gray en">&gt;</span>用户列表 <a class="btn btn-success radius btn-refresh r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" onclick="location.replace('{{URL::asset('/admin/member/index')}}');" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="text-c">
        <form action="{{URL::asset('/admin/member/index')}}" method="post" class="form-horizontal">
            {{csrf_field()}}
            <span class="select-box" style="width:150px;">
              <select class="select" size="1" name="business">
                  <option value=""  >全部</option>
                  @foreach($businesses_array['results'] as $business_array)
                      <option value="{{$business_array['code']}}" {{$business_array['code']==$business?'selected':''}}>{{$business_array['name']}}</option>
                  @endforeach
              </select>
            </span>
            <span class="select-box" style="width:150px;">
              <select class="select" size="1" name="time_type">
                  <option value=""  >全部</option>
                  @foreach($time_types_array as $time_type_array)
                    <option value="{{$time_type_array['day']}}" {{$time_type_array['day']==$time_type?'selected':''}}>{{$time_type_array['name']}}</option>
                  @endforeach
              </select>
            </span>
            <input id="search" name="search" type="text" class="input-text" value="{{$search?$search:''}}" style="width:200px" placeholder="用户ID/用户名/手机号">
            <button type="submit" class="btn btn-success" id="" name="">
                <i class="Hui-iconfont">&#xe665;</i> 搜索
            </button>
        </form>
    </div>
    <from action="{{URL::asset('/admin/member/export')}}" method="post"  class="form-horizontal">
        <div class="cl pd-5 bg-1 bk-gray mt-20">
            <span class="l">
                <a href="javascript:;" onclick="exportMember()" class="btn btn-danger radius"> 批量导出用户</a>
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
                <th>手机号</th>
                <th>公司</th>
                <th>业务类型</th>
                <th width="200">注册时间</th>
            </tr>
            </thead>
            <tbody>
            @foreach($datas['results'] as $data)
                <tr class="text-c">
                    <td>
                        <input type="checkbox" name="id_array" class="checkSingle" value="{{$data['id']}}" />
                    </td>
                    <td>{{$data['id']}}</td>
                    <td>{{$data['username']?$data['username']:'无'}}</td>
                    <td>{{$data['mobile']?$data['mobile']:'无'}}</td>
                    <td>{{$data['company']?$data['company']:'无'}}</td>
                    <td>
                        @if($data['businesses'])
                            {{implode(',',$data['businesses'])}}
                        @else
                            无
                        @endif
                    </td>
                    <td>{{$data['register_time']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </from>
</div>

@endsection

@section('script')
<script>
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
    //批量导出用户
    function exportMember(){
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
            $.ajax({
                url: 'http://testlushu.gowithtommy.com/api/auth/exportUser/?ids='+id_array,
                method: 'GET',
                xhrFields: {
                    responseType: 'document'
                },
                beforeSend: function (xhr) {
                    xhr.setRequestHeader("Authorization", "Token {{$admin['token']}}");
                },
                success: function (data) {
                    var a = document.createElement('a');
                    var url = window.URL.createObjectURL(data);
                    a.href = url;
                    a.download = '用户信息.zip';
                    a.click();
                    window.URL.revokeObjectURL(url);
                }
            });
        }
        else{
            layer.msg('请选择要导出的信息', {icon: 2, time: 2000})
        }
    }
</script>
@endsection