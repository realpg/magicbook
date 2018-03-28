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
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-sort" id="table-sort">
            <thead>
            <tr class="text-c">
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
</div>

@endsection