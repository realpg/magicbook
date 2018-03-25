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
        $request=$request->all();
        $common=$request['common'];
        $common['qrcode_img_url']=$request->cookie('qrcode_img_url');
        if($common['user']){
            $menu='pay';
            $param=array(
                'common'=>$common,
                'menu'=>$menu
            );
            return view('home.pay.index',$param);
        }
        else{
            return redirect('sign/in');
        }
    }
    //支付成功
    public function paySuccess(Request $request){
        $menu='pay';
        $param=array(
            'menu'=>$menu
        );
        return view('home.pay.success',$param);
    }
    //支付失败
    public function payFail(Request $request){
        $menu='pay';
        $param=array(
            'menu'=>$menu
        );
        return view('home.pay.fail',$param);
    }

}