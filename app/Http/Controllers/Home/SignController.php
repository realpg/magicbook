<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/20
 * Time: 21:14
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignController extends Controller
{
    //登录
    public function signIn(Request $request){
        return view('home.sign.in');
    }
    //注册
    public function signUp(Request $request){
        return view('home.sign.up');
    }
    //退出
    public function signOut(Request $request){
        return view('home.sign.out');
    }
}