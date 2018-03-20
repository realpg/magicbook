<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/14
 * Time: 10:39
 */
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PayController extends  Controller{
    //支付
    public function index(Request $request){
        return view('home.pay.index');
    }
    //支付成功
    public function paySuccess(Request $request){
        return view('home.pay.success');
    }
    //支付失败
    public function payFail(Request $request){
        return view('home.pay.fail');
    }

}