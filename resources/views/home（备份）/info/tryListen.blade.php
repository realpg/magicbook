@extends('home.layouts.base')

@section('content')
<style>
    .style_ft{border:1px solid rgba(153, 153, 153, 1);background:#fff;}
</style>
<div class="main container">
    <div class="row">
        <div class="dh col-xs-12 col-sm-2">
            <ul>
                <li class="change"><a href="{{URL::asset('/info/tryListen/')}}">试听生成记录</a></li>
                <li><a href="{{URL::asset('/info/consume/')}}">消费记录</a></li>
                <li><a href="{{URL::asset('/info/')}}">个人资料</a></li>
            </ul>
        </div>
        <div class="content col-xs-12 col-sm-10">
            <div class="select_term">
                <input type="text" name="" value="" placeholder="输入国家或者城市进行查询">
                <button>查询</button>
                <select name="" id="">
                    <option value="">按时间选择</option>
                </select>
                <select name="" id="">
                    <option value="">按版本选择</option>
                </select>
            </div>
            <div class="result table-responsive">
                <table class="table table-bordered" valign="center">
                    <thead>
                    <tr>
                        <th width="60">选择</th>
                        <th width="53">序号</th>
                        <th width="141">类型</th>
                        <th width="220">生成时间</th>
                        <th width="220">失效时间</th>
                        <th width="69">国家</th>
                        <th width="69">城市</th>
                        <th width="69">LOGO</th>
                        <th width="180">文字</th>
                        <th width="69">浏览量</th>
                        <th width="174">地址</th>
                        <th width="300">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="checkbox" name="" value="">
                            </td>
                            <td>195</td>
                            <td>美景版</td>
                            <td>2018-01-07 12:30:15</td>
                            <td>2018-01-07 12:30:15</td>
                            <td>法国</td>
                            <td>巴黎</td>
                            <td>-</td>
                            <td>要旅游，找途牛</td>
                            <td>1000</td>
                            <td>http://www.xxxxx.com...</td>
                            <td>
                                <button>复制地址</button>
                                <button>下载二维码</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" name="" value="">
                            </td>
                            <td>195</td>
                            <td>美景版</td>
                            <td>2018-01-07 12:30:15</td>
                            <td>2018-01-07 12:30:15</td>
                            <td>法国</td>
                            <td>巴黎</td>
                            <td>-</td>
                            <td>要旅游，找途牛</td>
                            <td>1000</td>
                            <td>http://www.xxxxx.com...</td>
                            <td>
                                <button>复制地址</button>
                                <button>下载二维码</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="footer">
                <input type="checkbox" name="" value="">
                <span>全选</span>
                <button>批量下载二维码</button>
                <button>批量删除</button>
            </div>
        </div>
    </div>
</div>
@endsection