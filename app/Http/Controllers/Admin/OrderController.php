<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/7
 * Time: 21:48
 */

namespace App\Http\Controllers\Admin;

use App\Components\Utils;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController
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
        if(array_key_exists('version',$data)){
            $version=$data['version'];
        }
        else{
            $version=null;
        }
        if(array_key_exists('search',$data)){
            $search=$data['search'];
        }
        else{
            $search=null;
        }
        $param=array(
            'version'=>$version,
            'search'=>$search,
            'page_size'=>self::PAGE_SIZE,
            'page'=>$page
        );
        $datas=Utils::curl_token('payment/order/',$param,$admin['token']);
        $datas=json_decode($datas,true);
        //版本列表
        $versions=Utils::curl('magic/version/',false);
        $versions=json_decode($versions,true);
        //赋值
        $data=array(
            'admin'=>$admin,
            'versions_array'=>$versions,
            'version'=>$version,
            'search'=>$search,
            'datas'=>$datas,
            'page'=>$page
        );
        return view('admin.order.index', $data);
    }
}