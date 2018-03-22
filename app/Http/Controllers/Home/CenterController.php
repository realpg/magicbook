<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/22
 * Time: 10:11
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CenterController extends  Controller{
    //获得试听记录
    public function generate(Request $request){
        $menu='center';
        $subsection='generate';
        $param=array(
            'menu'=>$menu,
            'subsection'=>$subsection
        );
        return view('home.center.generate', $param);
    }
    //获得消费记录
    public function consumption(Request $request){
        $menu='center';
        $subsection='consumption';
        $param=array(
            'menu'=>$menu,
            'subsection'=>$subsection
        );
        return view('home.center.consumption',$param);
    }
    //获得个人资料
    public function index(Request $request){
        $menu='center';
        $subsection='personal';
        $param=array(
            'menu'=>$menu,
            'subsection'=>$subsection
        );
        return view('home.center.index',$param);
    }
}