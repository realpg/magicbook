@extends('admin.layouts.app')

@section('content')
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 免费城市管理 <span class="c-gray en">&gt;</span>免费城市列表 <a class="btn btn-success radius btn-refresh r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" onclick="location.replace('{{URL::asset('/admin/city/index')}}');" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div>
        @foreach($datas as $data)
            <div>
                <div style="padding-left:10px;padding-right:10px;text-align: center;float:left;line-height: 30px;margin:10px;">
                    {{$data['name']}}
                </div>
                <div style="float:left;">
                    @foreach($data['cities'] as $city)
                    <div style="padding-left:10px;padding-right:10px;text-align: center;line-height: 30px;border:1px solid red;float:left;margin:10px;">
                        {{$city['name']}}
                        <a title="删除" href="javascript:;" onclick="del(this,'{{$city['id']}}')" class="ml-5" style="text-decoration:none;color:red;">
                            <i class="Hui-iconfont">&#xe6e2;</i>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="clear"></div>
        @endforeach
    </div>
    <div class="clear"></div>
    @if($chaincities)
    <div class="text-l mt-20">
        <form action="{{URL::asset('')}}" method="post" class="form-horizontal" id="form">
            {{csrf_field()}}
            <span class="select-box" style="width:150px;">
              <select class="select" size="1" name="continent" id="continent">
                  <option value=""  >请选择大洲</option>
                  @foreach($chaincities as $continent)
                  <option value="{{$continent['id']}}"  >{{$continent['name']}}</option>
                  @endforeach
              </select>
            </span>
            <span class="select-box" style="width:150px;">
              <select class="select" size="1" name="country" id="country">
                  <option value=""  >请选择国家</option>
              </select>
            </span>
            <span class="select-box" style="width:150px;">
              <select class="select" size="1" name="city" id="city">
                  <option value=""  >请选择城市</option>
              </select>
            </span>
            <button type="button" class="btn btn-success" id="add" name="">添加</button>
        </form>
    </div>
    @endif
</div>
<script id="country-template" type="text/x-dot-template">
    <option value=""  >请选择国家</option>
    @{{~ it:item:index }}
    <option value="@{{=item.id}}">@{{=item.name}}</option>
    @{{~ }}
</script>
<script id="city-template" type="text/x-dot-template">
    <option value=""  >请选择城市</option>
    @{{~ it:item:index }}
    <option value="@{{=item.id}}">@{{=item.name}}</option>
    @{{~ }}
</script>
@endsection

@section('script')
<script type="text/javascript" src="{{ URL::asset('/js/jquery.page.js') }}"></script>
<script type="text/javascript">
    $(function(){
        $('#continent').change(function(){
            var continent_id=$('#continent').val()
            var param={
                continent_id:continent_id,
                _token: "{{ csrf_token() }}"
            }
            getChainCountries('{{URL::asset('')}}', param, function (ret) {
                // console.log("getChainCountries is : "+JSON.stringify(ret))
                if (ret.result == true) {
                    var data=ret.ret
                    $('#country').html('');
                    $('#city').html('<option value="">请选择城市</option>');
                    var interText = doT.template($("#country-template").text())
                    $("#country").append(interText(data))
                } else {
                    console.log('getCountry err is :' +JSON.stringify(ret.message))
                }
            })

        })
        $('#country').change(function(){
            var continent_id=$('#continent').val()
            var country_id=$('#country').val()
            var param={
                continent_id:continent_id,
                country_id:country_id,
                _token: "{{ csrf_token() }}"
            }
            getChainCities('{{URL::asset('')}}', param, function (ret) {
                console.log("getChainCountries is : "+JSON.stringify(ret))
                if (ret.result == true) {
                    var data=ret.ret
                    $('#city').html('');
                    var interText = doT.template($("#city-template").text())
                    $("#city").append(interText(data))
                } else {
                    console.log('getCity err is :' +JSON.stringify(ret.message))
                }
            })

        })
        $('#add').click(function(){
            var city_id=$('#city').val();
            if(city_id){
                var param={
                    city_id:city_id,
                    _token: "{{ csrf_token() }}"
                }
                addCity('{{URL::asset('')}}', param, function (ret) {
                    console.log("addCity is : "+JSON.stringify(ret))
                    if (ret.result == true) {
                        layer.msg('添加城市成功', {icon: 1, time: 2000})
                        $('.btn-refresh').click();
                    } else {
                        layer.msg(ret.message, {icon: 2, time: 2000})
                    }
                })
            }
            else{
                layer.msg('请选择城市', {icon: 1, time: 2000})
            }
        })
    })
    /*删除*/
    function del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            //进行后台删除
            var param = {
                id: id,
                _token: "{{ csrf_token() }}"
            }
            delCity('{{URL::asset('')}}', param, function (ret) {
                if (ret.result == true) {
                    layer.msg('删除成功', {icon: 1, time: 1000});
                    $('.btn-refresh').click();
                } else {
                    layer.msg(ret.message, {icon: 2, time: 2000})
                }
            })
        });
    }
</script>
@endsection