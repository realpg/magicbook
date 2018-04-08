<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/28
 * Time: 11:10
 */

namespace App\Http\Controllers\Admin;

use App\Components\Utils;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    const PAGE_SIZE=10;
    //首页
    public function index(Request $request)
    {
        $data=$request->all();
        $admin = $request->session()->get('admin');
        if(array_key_exists('page',$data)){
            $page=$data['page'];
        }
        else{
            $page=1;
        }
        //获取用户列表
        if(array_key_exists('business',$data)){
            $business=$data['business'];
        }
        else{
            $business=null;
        }
        if(array_key_exists('time_type',$data)){
            $time_type=$data['time_type'];
        }
        else{
            $time_type=null;
        }
        if(array_key_exists('search',$data)){
            $search=$data['search'];
        }
        else{
            $search=null;
        }
        $param=array(
            'business'=>$business,
            'time_type'=>$time_type,
            'search'=>$search,
            'page_size'=>self::PAGE_SIZE,
            'page'=>$page
        );
        $datas=Utils::curl_token('auth/user/',$param,$admin['token']);
        $datas=json_decode($datas,true);
        //注册时间类型
        $time_types=array(
            array('day'=>'1','name'=>'最近一个月'),
            array('day'=>'2','name'=>'最近三个月'),
            array('day'=>'3','name'=>'未过期'),
            array('day'=>'4','name'=>'已失效'),
        );
        //业务类型编码
        $business_param=array();
        $businesses=Utils::curl('u/business/',$business_param);
        $businesses=json_decode($businesses,true);
        //////
        $url=Utils::URL;
        //赋值
        $data=array(
            'admin'=>$admin,
            'businesses_array'=>$businesses,
            'time_types_array'=>$time_types,
            'business'=>$business,
            'time_type'=>$time_type,
            'search'=>$search,
            'datas'=>$datas,
            'page'=>$page,
            'url'=>$url
        );
        return view('admin.member.index', $data);
    }
}