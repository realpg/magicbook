<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/14
 * Time: 13:12
 */
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller{
    //服务条款
    public function index(Request $request){
        $menu='service';
        $param=array(
            'menu'=>$menu
        );
        return view('home.service.index',$param);
    }
}