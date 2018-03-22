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
Route::group(['prefix' => '', 'middleware' => []], function () {
    Route::get('/', 'Home\IndexController@index');        //首页
    Route::get('/index/', 'Home\IndexController@index');        //首页
    Route::get('/audition/', 'Home\AuditionController@scenery');        //获取试听(美景版)
    Route::get('/audition/scenery/', 'Home\AuditionController@scenery');        //获取试听(美景版)
    Route::get('/audition/customization/', 'Home\AuditionController@customization');        //获取试听(定制版)
    Route::get('/audition/free/', 'Home\AuditionController@free');        //获取试听(免费版)
    Route::get('/center', 'Home\CenterController@personal');        //个人中心(个人资料)
    Route::get('/center/personal', 'Home\CenterController@personal');        //个人中心(个人资料)
    Route::get('/center/generate/', 'Home\CenterController@generate');        //个人中心(生成记录)
    Route::get('/center/consumption/', 'Home\CenterController@consumption');        //个人中心(消费记录)
    Route::get('/pay', 'Home\PayController@index');        //支付页面
    Route::get('/pay/success', 'Home\PayController@paySuccess');        //支付成功页面
    Route::get('/pay/fail', 'Home\PayController@payFail');        //支付失败页面
    Route::get('/service', 'Home\ServiceController@index');        //服务条款
    Route::get('/sign/in', 'Home\SignController@signIn');        //登录
    Route::get('/sign/up', 'Home\SignController@signUp');        //注册
    Route::get('/sign/out', 'Home\SignController@signOut');        //退出
    Route::get('/sign/success', 'Home\SignController@signSuccess');        //注册成功
});
