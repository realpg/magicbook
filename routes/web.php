<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//前台
Route::group(['prefix' => '', 'middleware' => ['WebBase']], function () {
    Route::get('/', 'Home\IndexController@index');        //首页
    Route::get('/index/', 'Home\IndexController@index');        //首页
//    Route::get('/region/country', 'Home\IndexController@getCountries');        //获取国家列表
//    Route::get('/region/city', 'Home\IndexController@getCities');        //获取城市列表
    Route::get('/audition/', 'Home\AuditionController@scenery') ;        //获取试听(美景版)
    Route::get('/audition/scenery/', 'Home\AuditionController@scenery') ;        //获取试听(美景版)
    Route::get('/audition/customization/', 'Home\AuditionController@customization') ;        //获取试听(定制版)
    Route::get('/audition/free/', 'Home\AuditionController@free') ;       //获取试听(免费版)
    Route::post('/audition/free/do', 'Home\AuditionController@freeDo') ;       //获取试听(免费版)
    Route::post('/audition/prepay/do', 'Home\AuditionController@prepayDo');       //批量生成收费版试听数据接口
    Route::post('/audition/getQrcodeState', 'Home\AuditionController@getQrcodeState');       //查询支付二维码状态接口
    Route::get('/region/country', 'Home\AuditionController@getCountries');        //获取国家列表
    Route::get('/region/city', 'Home\AuditionController@getCities');        //获取城市列表
    Route::get('/center', 'Home\CenterController@personal');        //个人中心(个人资料)
    Route::get('/center/personal', 'Home\CenterController@personal');        //个人中心(个人资料)
    Route::get('/center/generate/', 'Home\CenterController@generate');        //个人中心(生成记录)
    Route::get('/center/consumption/', 'Home\CenterController@consumption');        //个人中心(消费记录)
    Route::get('/center/downloadQrcode', 'Home\CenterController@downloadQrcode');        //个人中心(下载试听二维码)
    Route::post('/center/bulkDeletePurchase', 'Home\CenterController@bulkDeletePurchase');        //个人中心(批量删除试听记录接口)
    Route::get('/pay', 'Home\PayController@index');        //支付页面
    Route::get('/pay/success', 'Home\PayController@paySuccess');        //支付成功页面
    Route::get('/pay/fail', 'Home\PayController@payFail');        //支付失败页面
    Route::get('/service', 'Home\ServiceController@index');        //服务条款
    Route::get('/sign/in', 'Home\SignController@signIn');        //登录
    Route::post('/sign/in', 'Home\SignController@signInDo');        //登录执行
    Route::get('/sign/up', 'Home\SignController@signUp');        //注册
    Route::post('/sign/up', 'Home\SignController@signUpDo');        //注册执行
    Route::get('/sign/out', 'Home\SignController@signOut');        //退出
    Route::get('/sign/success', 'Home\SignController@signSuccess');        //注册成功


    Route::get('/free/city', 'Home\FreeController@city');        //免费试听（城市）
    Route::get('/free/spot', 'Home\FreeController@spot');        //免费试听（景点）
    Route::get('/free/childspot', 'Home\FreeController@childspot');        //免费试听（景点）
});

//后台
Route::get('/admin/login', 'Admin\LoginController@login');        //登录
Route::post('/admin/login', 'Admin\LoginController@loginDo');   //post登录请求
Route::get('/admin/loginout', 'Admin\LoginController@loginout');  //注销
Route::group(['prefix' => 'admin', 'middleware' => ['admin.login']], function () {
    //首页
    Route::get('/', 'Admin\IndexController@index');       //首页
    Route::get('/index', 'Admin\IndexController@index');  //首页
    Route::get('/welcome', 'Admin\IndexController@welcome');  //欢迎页

    //用户相关
    Route::get('/member/index', 'Admin\MemberController@index');       //用户相关首页
    Route::post('/member/index', 'Admin\MemberController@index');       //用户搜索
    Route::get('/member/export', 'Admin\MemberController@export');       //批量导出用户

    //版本信息
    Route::get('/version/index', 'Admin\VersionController@index');       //版本信息首页
    Route::get('/version/edit', 'Admin\VersionController@edit');       //编辑版本信息首页
    Route::post('/version/edit', 'Admin\VersionController@editDo');       //编辑版本信息首页（执行）
});
