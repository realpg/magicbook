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

class IndexController extends  Controller{
    //首页
    public function index(Request $request){
        $menu='index';
        $subsection='index';
        $param=array(
            'menu'=>$menu,
            'subsection'=>$subsection
        );
        return view('home.index.index',$param);
    }
}