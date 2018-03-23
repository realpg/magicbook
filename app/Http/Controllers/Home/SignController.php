<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/20
 * Time: 21:14
 */

namespace App\Http\Controllers\Home;

use App\Components\Utils;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignController extends Controller
{
    //登录
    public function signIn(Request $request){
        $menu='sign';
        $param=array(
            'menu'=>$menu
        );
        return view('home.sign.in',$param);
    }
    //注册
    public function signUp(Request $request){
        $request=$request->all();
        $menu='sign';
        $businesses_param=array();
        $businesses=Utils::curl('u/business/',$businesses_param);
        $businesses=json_decode($businesses,true);
        $param=array(
            'menu'=>$menu,
            'businesses'=>$businesses,
        );
        return view('home.sign.up',$param);
    }
    //注册成功
    public function signSuccess(Request $request){
        $menu='sign';
        $param=array(
            'menu'=>$menu
        );
        return view('home.sign.success',$param);
    }
    //退出
    public function signOut(Request $request){
        $menu='sign';
        $param=array(
            'menu'=>$menu
        );
        return view('home.sign.out',$param);
    }
}