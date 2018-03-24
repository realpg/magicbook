@extends('home.layouts.base')

@section('content')
<div id="main-body">
    <div class="container margin-top-100">
        @include('home.layouts.center')
        <div class="width-100 text-center padding-5">
            <div class="line-height-40">
                <div class="col-xs-3 col-sm-3 float-left font-size-16">
                    <div class="col-xs-7 col-sm-7 text-right">
                        按时间选择
                    </div>
                    <div class="col-xs-2 col-sm-2">
                        <img src="{{URL::asset('img/xuanxiangka_03.png')}}" class="width-35px vertical-align-middle" />
                        {{--<span class="glyphicon glyphicon-menu-up font-size-10 height-10px display-block"></span>--}}
                        {{--<sapn class="glyphicon glyphicon-menu-down font-size-10 height-10px display-block"></sapn>--}}
                    </div>
                    <div class="col-xs-3 col-sm-3 text-right padding-0">
                        <span class="width-100 height-100 border-right"></span>
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 float-left font-size-16">
                    <div class="col-xs-7 col-sm-7 text-right">
                        按版本选择
                    </div>
                    <div class="col-xs-2 col-sm-2">
                        <img src="{{URL::asset('img/xuanxiangka_03.png')}}" class="width-35px vertical-align-middle" />
                        {{--<span class="glyphicon glyphicon-menu-up font-size-10 height-10px display-block"></span>--}}
                        {{--<sapn class="glyphicon glyphicon-menu-down font-size-10 height-10px display-block"></sapn>--}}
                    </div>
                    <div class="col-xs-3 col-sm-3 text-right padding-0">
                        <span class="width-100 height-100 border-right"></span>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 float-left">
                    <input type="text" class="form-control border-0 width-90 float-left" style="border-radius:0;border-bottom:1px solid #989898;box-shadow:none;" placeholder="请输入国家或者城市查询" />
                    <button class="width-10 float-left bg-none border-0">
                        <img src="{{URL::asset('img/search_03.png')}}" class="height-40px"  />
                    </button>
                </div>
            </div>
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
                    <tr>
                        <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;"><input type="checkbox" /></td>
                        <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">191</td>
                        <td class="text-center font-color-red" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">定制版</td>
                        <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">2018/01/11</td>
                        <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">2018/05/11</td>
                        <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">2000</td>
                        <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">中国/昆明</td>
                        <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">
                            <img src="{{URL::asset('img/logo.png')}}" class="width-28px height-28px" />
                        </td>
                        <td class="text-center" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">爱旅游.爱途牛</td>
                        <td class="text-center font-color-blue" style="vertical-align: middle;border-bottom: 1px #F2F2F2 solid;">
                            <a href="">
                                www.tuniu.com
                            </a>
                        </td>
                        <td class="text-center" style="border-bottom: 1px #F2F2F2 solid;">
                            <button type="button" class="btn bg-grey-btn" style="border-radius: 0;">下载二维码</button>
                            <button type="button" class="btn bg-grey-btn" style="border-radius: 0;">复制地址</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="package-card">
            <div class="card-div height-50px padding-left-10 padding-right-10">
                <div class="float-left line-height-50">
                    <input type="checkbox" />
                </div>
                <div class="float-right line-height-45">
                    <button class="btn bg-red font-color-white margin-right-20" type="button" style="border-radius: 0; color:#fff;">批量下载二维码</button>
                    <button class="btn font-color-red bg-none border border-red" type="button" style="border-radius: 0; color: #E21B14;">批量删除</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection