@extends('home.layouts.base')

@section('content')
    <style>
        .style_ft{border:1px solid rgba(153, 153, 153, 1);background:#fff;}
    </style>
    <div class="main container">
        <div class="row">
            <div class="dh col-xs-12 col-sm-2">
                <ul>
                    <li><a href="{{URL::asset('/info/tryListen/')}}">试听生成记录</a></li>
                    <li class="change"><a href="{{URL::asset('/info/consume/')}}">消费记录</a></li>
                    <li><a href="{{URL::asset('/info/')}}">个人资料</a></li>
                </ul>
            </div>
            <div class="content col-xs-12 col-sm-10">
                <div class="select_term">
                    <input type="text" name="" value="" placeholder="输入订单号查询">
                    <button>查询</button>
                    <select name="" id="">
                        <option value="">按版本选择</option>
                    </select>
                </div>
                <div class="result table-responsive" style="height:400px;">
                    <table class="table table-bordered" valign="center" >
                        <thead>
                        <tr>
                            <th width="259">订单号</th>
                            <th width="221">时间</th>
                            <th width="125">城市数量</th>
                            <th width="192">版本类型</th>
                            <th width="113">金额（元）</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>P2018010708301500012</td>
                            <td>2018-01-07 08:30:15</td>
                            <td>5</td>
                            <td>美景版</td>
                            <td>10</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="page float-right">
                    <span class="float-left">共3个订单</span>
                    <div class="float-left pagelist">
                        <ul>
                            <li class="change">1</li>
                            <li class="cs">2</li>
                            <li class="cs">3</li>
                            <li class="cs">...</li>
                            <li class="cs">24</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection