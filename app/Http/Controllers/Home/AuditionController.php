<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/8
 * Time: 16:54
 */
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuditionController extends  Controller{
    //获取试听-美景版
    public function scenery(Request $request){
        return view('home.audition.scenery');
    }
    //获取试听-制定版
    public function customization(Request $request){
        return view('home.audition.customization');
    }
    //获取试听-免费版
    public function free(Request $request){
        return view('home.audition.free');
    }
}