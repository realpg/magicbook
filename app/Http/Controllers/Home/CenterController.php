<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/22
 * Time: 10:11
 */

namespace App\Http\Controllers\Home;

use App\Components\Utils;
use App\Http\Controllers\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CenterController extends  Controller{
    const PAGE_SIZE=10;
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
                $time_type_search=null;
            }
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
            if(array_key_exists('page',$request)){
                $page_search=$request['page'];
            }
            else{
                $page_search=1;
            }
            $purchase_param=array(
                'page'=>$page_search,
                'page_size'=>self::PAGE_SIZE,
                'time_type'=>$time_type_search,
                'version'=>$version_search,
                'search'=>$search
            );
            $purchases=Utils::curl_token('pay/user/'.$common['user']['id'].'/purchase/',$purchase_param,$common['user']['token']);
            $purchases=json_decode($purchases,true);
            ////
            $url=Utils::URL;
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
                'page'=>$page_search,
                'url'=>$url
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
            if(array_key_exists('page',$request)){
                $page_search=$request['page'];
            }
            else{
                $page_search=1;
            }
            $order_param=array(
                'page'=>$page_search,
                'page_size'=>self::PAGE_SIZE,
                'version'=>$version_search,
                'search'=>$search
            );
            $orders=Utils::curl_token('pay/user/'.$common['user']['id'].'/order/',$order_param,$common['user']['token']);
            $orders=json_decode($orders,true);
            $param=array(
                'common'=>$common,
                'menu'=>$menu,
                'subsection'=>$subsection,
                'versions'=>$versions,
                'orders'=>$orders,
                'version_search'=>$version_search,
                'search'=>$search,
                'page'=>$page_search,
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
    //下载试听二维码
//    public function downloadQrcode(Request $request){
//        $request=$request->all();
//        $common=$request['common'];
//        if(array_key_exists('id',$request)&&$common['user']){
//            $id=$request['id'];
//            $param=array(
//                'id'=>$id
//            );
//            $qrcode=Utils::curl_token('pay/downloadQrcode/',$param,$common['user']['token']);
//
//            return $qrcode;
////            $qrcode=json_decode($qrcode,true);
////            return $qrcode;
////            if($qrcode){
////                if(array_key_exists('detail',$qrcode)){
////                    return ApiResponse::makeResponse(false, $qrcode['detail'], ApiResponse::UNKNOW_ERROR);
////                }
////                else{
////                    return ApiResponse::makeResponse(true, $qrcode, ApiResponse::SUCCESS_CODE);
////                }
////            }
////            else{
////                return ApiResponse::makeResponse(false, ApiResponse::$errorMassage[ApiResponse::UNKNOW_ERROR], ApiResponse::UNKNOW_ERROR);
////            }
//        }
//        else{
//            return ApiResponse::makeResponse(false, ApiResponse::$errorMassage[ApiResponse::MISSING_PARAM], ApiResponse::MISSING_PARAM);
//        }
//    }
    public function downloadQrcode(Request $request){
        $request=$request->all();
        $common=$request['common'];
        $param=array(
            'id'=>7
        );
        Utils::curl_token('pay/downloadQrcode/',$param,$common['user']['token']);
    }
    //批量删除试听记录接口
    public function bulkDeletePurchase(Request $request){
        $request=$request->all();
        $common=$request['common'];
        if(array_key_exists('ids',$request)&&$common['user']){
            $param=array(
                'ids'=>$request['ids']
            );
            $result=Utils::curl_token('pay/bulkDeletePurchase/',$param,$common['user']['token'],1);
            $result=json_decode($result,true);
            return ApiResponse::makeResponse(true, $result, ApiResponse::SUCCESS_CODE);
//            if($result){
//                if(array_key_exists('detail',$result)){
//                    return ApiResponse::makeResponse(false, $result['detail'], ApiResponse::UNKNOW_ERROR);
//                }
//                else{
//                    return ApiResponse::makeResponse(true, $result, ApiResponse::SUCCESS_CODE);
//                }
//            }
//            else{
//                return ApiResponse::makeResponse(false, ApiResponse::$errorMassage[ApiResponse::UNKNOW_ERROR], ApiResponse::UNKNOW_ERROR);
//            }
        }
        else{
            return ApiResponse::makeResponse(false, ApiResponse::$errorMassage[ApiResponse::MISSING_PARAM], ApiResponse::MISSING_PARAM);
        }
    }
}