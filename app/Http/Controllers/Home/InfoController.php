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

class InfoController extends  Controller{
    //获得试听记录
    public function getTryListenInfo(Request $request){
        return view('home.info.tryListen');
    }
    //获得消费记录
    public function getConsumeInfo(Request $request){
        return view('home.info.consume');
    }
    //获得个人资料
    public function getInfos(Request $request){
        return view('home.info.info');
    }
}