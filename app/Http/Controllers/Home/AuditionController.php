<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/8
 * Time: 16:54
 */
namespace App\Http\Controllers\Home;

use App\Components\Utils;
use App\Http\Controllers\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuditionController extends  Controller{
    //获取试听-美景版
    public function scenery(Request $request){
        $request=$request->all();
        $common=$request['common'];
        $menu='audition';
        $subsection='scenery';
        $param=array(
            'common'=>$common,
            'menu'=>$menu,
            'subsection'=>$subsection,
        );
        return view('home.audition.scenery',$param);
    }
    //获取试听-制定版
    public function customization(Request $request){
        $request=$request->all();
        $common=$request['common'];
        $menu='audition';
        $subsection='customization';
        $param=array(
            'common'=>$common,
            'menu'=>$menu,
            'subsection'=>$subsection
        );
        return view('home.audition.customization',$param);
    }
    //获取试听-免费版
    public function free(Request $request){
        $request=$request->all();
        $common=$request['common'];
        if($common['user']){
            $menu='audition';
            $subsection='free';
            $param=array(
                'common'=>$common,
                'menu'=>$menu,
                'subsection'=>$subsection
            );
            return view('home.audition.free',$param);
        }
        else{
            return redirect('sign/in');
        }
    }
    //获取试听-免费版（执行）
    public function freeDo(Request $request){
        $request=$request->all();
        $common=$request['common'];
        if(array_key_exists('item_id',$request)){
            $item_id=$request['item_id'];
            $param=array(
                'item_id'=>$item_id
            );
            $purchase=Utils::curl_token('pay/version/free/purchase/',$param,$common['user']['token'],1);
            $purchase=json_decode($purchase,true);
            if($purchase){
                if(array_key_exists('detail',$purchase)){
                    return ApiResponse::makeResponse(false, $purchase['detail'], ApiResponse::UNKNOW_ERROR);
                }
                else{
                    return ApiResponse::makeResponse(true, $purchase, ApiResponse::SUCCESS_CODE);
                }
            }
            else{
                return ApiResponse::makeResponse(false, ApiResponse::$errorMassage[ApiResponse::UNKNOW_ERROR], ApiResponse::UNKNOW_ERROR);
            }
        }
        else{
            return ApiResponse::makeResponse(false, ApiResponse::$errorMassage[ApiResponse::MISSING_PARAM], ApiResponse::MISSING_PARAM);
        }
    }
}