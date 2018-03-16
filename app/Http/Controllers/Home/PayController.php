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
    public function show(Request $request){
        return view('home.pay.pay');
    }
    //支付成功
    public function paySuccess(Request $request){
        return view('home.pay.paySuccess');
    }
    //支付失败
    public function payFinal(Request $request){
        return view('home.pay.payFinal');
    }

}