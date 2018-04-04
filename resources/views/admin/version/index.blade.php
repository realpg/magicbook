@extends('admin.layouts.app')

@section('content')
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 修改版本信息 <span class="c-gray en">&gt;</span>版本信息列表 <a class="btn btn-success radius btn-refresh r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" onclick="location.replace('{{URL::asset('/admin/version/index')}}');" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-sort" id="table-sort">
            <thead>
            <tr class="text-c">
                <th>编码</th>
                <th>版本名称</th>
                <th>是否支持试听页面</th>
                <th>是否支持自定义城市</th>
                <th>是否支持自定义Logo</th>
                <th>有效天数</th>
                <th>价格</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($datas['results'] as $data)
                <tr class="text-c">
                    <td>{{$data['code']}}</td>
                    <td>{{$data['name']}}</td>
                    <td>{{$data['can_preview_page']?'是':'否'}}</td>
                    <td>{{$data['can_customize_city']?'是':'否'}}</td>
                    <td>{{$data['can_customize_logo']?'是':'否'}}</td>
                    <td>{{$data['valid_days']}}</td>
                    <td>{{$data['price']}}</td>
                    <td class="td-manage">
                        <a title="查看详情" href="javascript:;" onclick="version_edit('查看详情','{{URL::asset('/admin/version/edit')}}?code={{$data['code']}}')" class="ml-5" style="text-decoration:none">
                            <i class="Hui-iconfont">&#xe695;</i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
    /*查看加盟信息详情*/
    function version_edit(title, url) {
        // console.log("version_edit url:" + url);
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
</script>
@endsection