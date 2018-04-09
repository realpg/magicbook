<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/14
 * Time: 13:12
 */
namespace App\Http\Controllers\Home;

use App\Components\Utils;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller{
    //服务条款
    public function index(Request $request){
        $request=$request->all();
        $common=$request['common'];
        $menu='service';
        $service_param=array();
        $service=Utils::curl('m/agreement/',$service_param);
        $service=json_decode($service,true);
        $service['content']=nl2br($service['content']);
        $param=array(
            'menu'=>$menu,
            'service'=>$service,
            'common'=>$common
        );
        return view('home.service.index',$param);
    }
}