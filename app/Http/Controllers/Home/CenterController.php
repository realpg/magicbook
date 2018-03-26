<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/22
 * Time: 10:11
 */

namespace App\Http\Controllers\Home;

use App\Components\Utils;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CenterController extends  Controller{
    //获得试听记录
    public function generate(Request $request){
        $request=$request->all();
        $common=$request['common'];
        if($common['user']){
            $menu='center';
            $subsection='generate';
            $version_param=array();
            $version=Utils::curl('magic/version/',$version_param);
            $versions=json_decode($version,true);
            $time_types=array(
                array('day'=>'1','name'=>'最近一个月'),
                array('day'=>'2','name'=>'最近三个月'),
                array('day'=>'3','name'=>'未过期'),
                array('day'=>'4','name'=>'已失效'),
            );
            if(array_key_exists('time_type',$request)){
                $time_type_search=$request['time_type'];
            }
            else{
                $time_type_search='';
            }
            if(array_key_exists('search',$request)){
                $search=$request['search'];
            }
            else{
                $search='';
            }
            if(array_key_exists('version',$request)){
                $version_search=$request['version'];
            }
            else{
                $version_search='';
            }
            $purchase_param=array(
                'time_type'=>$time_type_search,
                'version'=>$version_search,
                'search'=>$search
            );
            $purchases=Utils::curl_token('pay/user/'.$common['user']['id'].'/purchase/',$purchase_param,$common['user']['token']);
            $purchases=json_decode($purchases,true);
            $param=array(
                'common'=>$common,
                'menu'=>$menu,
                'subsection'=>$subsection,
                'time_types'=>$time_types,
                'versions'=>$versions,
                'purchases'=>$purchases,
                'time_type_search'=>$time_type_search,
                'search'=>$search,
                'version_search'=>$version_search,
            );
            return view('home.center.generate', $param);
        }
        else{
            return redirect('sign/in');
        }
    }
    //获得消费记录
    public function consumption(Request $request){
        $request=$request->all();
        $common=$request['common'];
        if($common['user']){
            $menu='center';
            $subsection='consumption';
            $version_param=array();
            $version=Utils::curl('magic/version/',$version_param);
            $versions=json_decode($version,true);
            if(array_key_exists('search',$request)){
                $search=$request['search'];
            }
            else{
                $search=null;
            }
            if(array_key_exists('version',$request)){
                $version_search=$request['version'];
            }
            else{
                $version_search=null;
            }
            $order_param=array(
                'version'=>$version_search,
                'search'=>$search
            );
//            dd($order_param);
            $orders=Utils::curl_token('pay/user/'.$common['user']['id'].'/order/',$order_param,$common['user']['token']);
//            dd($common['user']['token']);
            $orders=json_decode($orders,true);
//            dd($orders);
            $param=array(
                'common'=>$common,
                'menu'=>$menu,
                'subsection'=>$subsection,
                'versions'=>$versions,
                'orders'=>$orders
            );
            return view('home.center.consumption',$param);
        }
        else{
            return redirect('sign/in');
        }
    }
    //获得个人资料
    public function personal(Request $request){
        $request=$request->all();
        $common=$request['common'];
        if($common['user']){
            $menu='center';
            $subsection='personal';
            $param=array(
                'common'=>$common,
                'menu'=>$menu,
                'subsection'=>$subsection
            );
            return view('home.center.personal',$param);
        }
        else{
            return redirect('sign/in');
        }
    }
}