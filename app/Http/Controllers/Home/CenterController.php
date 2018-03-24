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
        $common=$request['common'];
        if($common['user']){
            $menu='center';
            $subsection='generate';
            $param=array(
                'common'=>$common,
                'menu'=>$menu,
                'subsection'=>$subsection
            );
            return view('home.center.generate', $param);
        }
        else{
            return redirect('sign/in');
        }
    }
    //获得消费记录
    public function consumption(Request $request){
        $common=$request['common'];
        if($common['user']){
            $menu='center';
            $subsection='consumption';
            $param=array(
                'common'=>$common,
                'menu'=>$menu,
                'subsection'=>$subsection
            );
            return view('home.center.consumption',$param);
        }
        else{
            return redirect('sign/in');
        }
    }
    //获得个人资料
    public function personal(Request $request){
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