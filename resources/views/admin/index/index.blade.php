@extends('admin.layouts.app')

@section('content')
    <header class="navbar-wrapper">
        <div class="navbar navbar-fixed-top">
            <div class="container-fluid cl"><a class="logo navbar-logo f-l mr-10 hidden-xs" href="/aboutHui.shtml">魔法路书</a>
                <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="#"></a>
                <span class="logo navbar-slogan f-l mr-10 hidden-xs">v1.3</span>
                <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
                <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                    <ul class="cl">
                        <li><i class="Hui-iconfont margin-right-10">&#xe62c;</i>{{$admin['username']}}</li>
                        <li><a href="{{ URL::asset('/') }}" class="dropDown_A" target="_blank">查看前台</a></li>
                        <li><a href="{{ URL::asset('/admin/loginout') }}">安全退出</a></li>
                        <li id="Hui-skin" class="dropDown right dropDown_hover">
                            <a href="javascript:;" class="dropDown_A" title="换肤">
                                <i class="Hui-iconfont font-color-white" style="font-size:18px">&#xe62a;</i>
                            </a>
                            <ul class="dropDown-menu menu radius box-shadow">
                                <li><a href="javascript:;" class=" font-color-black" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
                                <li><a href="javascript:;" class=" font-color-black" data-val="blue" title="蓝色">蓝色</a></li>
                                <li><a href="javascript:;" class=" font-color-black" data-val="green" title="绿色">绿色</a></li>
                                <li><a href="javascript:;" class=" font-color-black" data-val="red" title="红色">红色</a></li>
                                <li><a href="javascript:;" class=" font-color-black" data-val="yellow" title="黄色">黄色</a></li>
                                <li><a href="javascript:;" class=" font-color-black" data-val="orange" title="橙色">橙色</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <aside class="Hui-aside">
        <div class="menu_dropdown bk_2">
            <dl id="menu-members">
                <dt>
                    <i class="Hui-iconfont">&#xe62b;</i> 用户相关<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
                </dt>
                <dd>
                    <ul>
                        <li><a data-href="{{URL::asset('/admin/member/index')}}" data-title="用户相关" href="javascript:void(0)">用户相关</a></li>
                    </ul>
                </dd>
            </dl>
        </div>
        <div class="menu_dropdown bk_2">
            <dl id="menu-settings">
                <dt>
                    <i class="Hui-iconfont">&#xe62e;</i> 设置相关<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
                </dt>
                <dd>
                    <ul>
                        <li><a data-href="{{URL::asset('/admin/version/index')}}" data-title="修改版本信息" href="javascript:void(0)">修改版本信息</a></li>
                        <li><a data-href="{{URL::asset('/admin/service/edit')}}" data-title="修改服务条款" href="javascript:void(0)">修改服务条款</a></li>
                        <li><a data-href="{{URL::asset('/admin/city/index')}}" data-title="免费城市管理" href="javascript:void(0)">免费城市管理</a></li>
                    </ul>
                </dd>
            </dl>
        </div>
        <div class="menu_dropdown bk_2">
            <dl id="menu-orders">
                <dt>
                    <i class="Hui-iconfont">&#xe687;</i> 订单相关<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
                </dt>
                <dd>
                    <ul>
                        <li><a data-href="{{URL::asset('/admin/audition/index')}}" data-title="试听数据列表" href="javascript:void(0)">试听数据列表</a></li>
                        <li><a data-href="{{URL::asset('/admin/order/index')}}" data-title="用户的消费记录" href="javascript:void(0)">用户的消费记录</a></li>
                    </ul>
                </dd>
            </dl>
        </div>
    </aside>
    <div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a>
    </div>
    <section class="Hui-article-box">
        <div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
            <div class="Hui-tabNav-wp">
                <ul id="min_title_list" class="acrossTab cl">
                    <li class="active">
                        <span title="业务概览" data-href="welcome.html">系统首页</span>
                        <em></em></li>
                </ul>
            </div>
            <div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S"
                                                      href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a
                        id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i
                            class="Hui-iconfont">
                        &#xe6d7;</i></a></div>
        </div>
        <div id="iframe_box" class="Hui-article">
            <div class="show_iframe">
                <div style="display:none" class="loading"></div>
                <iframe scrolling="yes" frameborder="0" src="{{ URL::asset('/admin/welcome') }}"></iframe>
            </div>
        </div>
    </section>

    <div class="contextMenu" id="Huiadminmenu">
        <ul>
            <li id="closethis">关闭当前</li>
            <li id="closeall">关闭全部</li>
        </ul>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        /*资讯-添加*/
        function mysqlf_edit(title,url){
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }
    </script>
@endsection