<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/8
 * Time: 16:54
 */
namespace App\Http\Controllers\Home;

use App\Components\QNManager;
use App\Components\Utils;
use App\Http\Controllers\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuditionController extends  Controller{
    //获取试听-美景版
    public function scenery(Request $request){
        $request=$request->all();
        $common=$request['common'];
        //获取首页信息//
        $index_param=array();
        $index=Utils::curl('magic/index/',$index_param);
        $index=json_decode($index,true);
        $common=array_merge($index,$common);
        ///////////////
        if($common['user']){
            $menu='audition';
            $subsection='scenery';
            $param_version=array();
            $mjtt=Utils::curl_token('magic/version/mjtt/',$param_version,$common['user']['token']);
            $mjtt=json_decode($mjtt,true);
            //获取城市
            $location_param=array(
                'version'=>$mjtt['code']
            );
            $locations=Utils::curl_token('location/chaincity/',$location_param,$common['user']['token']);
            $locations=json_decode($locations,true);
            $param=array(
                'common'=>$common,
                'menu'=>$menu,
                'subsection'=>$subsection,
                'mjtt'=>$mjtt,
                'locations'=>$locations
            );
            return view('home.audition.scenery',$param);
        }
        else{
            return redirect('sign/in');
        }
    }
    //获取试听-制定版
    public function customization(Request $request){
        $request=$request->all();
        $common=$request['common'];
        //获取首页信息//
        $index_param=array();
        $index=Utils::curl('magic/index/',$index_param);
        $index=json_decode($index,true);
        $common=array_merge($index,$common);
        ///////////////
        if($common['user']){
            $menu='audition';
            $subsection='customization';
            $param_version=array();
            $custom=Utils::curl_token('magic/version/custom/',$param_version,$common['user']['token']);
            $custom=json_decode($custom,true);
            //获取城市
            $location_param=array(
                'version'=>$custom['code']
            );
            $locations=Utils::curl_token('location/chaincity/',$location_param,$common['user']['token']);
            $locations=json_decode($locations,true);
            //生成七牛token
            $upload_token = QNManager::uploadToken();
            $param=array(
                'common'=>$common,
                'menu'=>$menu,
                'subsection'=>$subsection,
                'custom'=>$custom,
                'upload_token'=>$upload_token,
                'locations'=>$locations
            );
            return view('home.audition.customization',$param);
        }
        else{
            return redirect('sign/in');
        }
    }
    //获取试听-免费版
    public function free(Request $request){
        $request=$request->all();
        $common=$request['common'];
        //获取首页信息//
        $index_param=array();
        $index=Utils::curl('magic/index/',$index_param);
        $index=json_decode($index,true);
        $common=array_merge($index,$common);
        ///////////////
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
        if($common['user']){
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
        else{
            return ApiResponse::makeResponse(false, ApiResponse::$errorMassage[ApiResponse::TOKEN_LOST], ApiResponse::TOKEN_LOST);
        }
    }
    //批量生成收费版试听数据（执行）
    public function prepayDo(Request $request){
        $request=$request->all();
        $common=$request['common'];
        if(array_key_exists('version',$request)&&array_key_exists('cities',$request)){
            $version=$request['version'];
            $cities=json_encode($request['cities'],true);
            if(array_key_exists('slogans',$request)&&array_key_exists('logos',$request)){
                $slogans=json_encode($request['slogans'],true);
                $logos=json_encode($request['logos'],true);
                $param=array(
                    'version'=>$version,
                    'cities'=>$cities,
                    'slogans'=>$slogans,
                    'logos'=>$logos
                );
            }
            else{
                if(array_key_exists('slogans',$request)){
                    $slogans=json_encode($request['slogans'],true);
                    $param=array(
                        'version'=>$version,
                        'cities'=>$cities,
                        'slogans'=>$slogans,
                    );
                }
                else if(array_key_exists('logos',$request)){
                    $logos=json_encode($request['logos'],true);
                    $param=array(
                        'version'=>$version,
                        'cities'=>$cities,
                        'logos'=>$logos
                    );
                }
                else{
                    $param=array(
                        'version'=>$version,
                        'cities'=>$cities,
                    );
                }
            }
            $prepay=Utils::curl_token('pay/prepay/',$param,$common['user']['token'],1);
            $prepay=json_decode($prepay,true);
            if($prepay){
                if(array_key_exists('detail',$prepay)){
                    return ApiResponse::makeResponse(false, $prepay['detail'], ApiResponse::UNKNOW_ERROR);
                }
                else{
                    return ApiResponse::makeResponse(true, $prepay, ApiResponse::SUCCESS_CODE);
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


    //获取国家列表
    public function getCountries(Request $request){
        $request=$request->all();
        if(array_key_exists('continent_id',$request)){
            $continent_id=$request['continent_id'];
            $common=$request['common'];
            $location_param=array(
                'version'=>$request['version']
            );
            if($request['version']=='free'){
                $locations=Utils::curl('location/chainfreecity/',$location_param);
            }
            else{
                $locations=Utils::curl_token('location/chaincity/',$location_param,$common['user']['token']);
            }
            $locations=json_decode($locations,true);
            foreach ($locations as $location){
                if($continent_id==$location['id']){
                    $countries=$location['countries'];
                }
            }
            if($countries){
                return ApiResponse::makeResponse(true, $countries, ApiResponse::SUCCESS_CODE);
            }
            else{
                return ApiResponse::makeResponse(false, ApiResponse::$errorMassage[ApiResponse::UNKNOW_ERROR], ApiResponse::UNKNOW_ERROR);
            }
        }
        else{
            return ApiResponse::makeResponse(false, ApiResponse::$errorMassage[ApiResponse::MISSING_PARAM], ApiResponse::MISSING_PARAM);
        }
    }

    //获取城市列表
    public function getCities(Request $request){
        $request=$request->all();
        if(array_key_exists('continent_id',$request)&&array_key_exists('country_id',$request)){
            $continent_id=$request['continent_id'];
            $country_id=$request['country_id'];
            $common=$request['common'];
//            $continents=$common['cities'];
            $location_param=array(
                'version'=>$request['version']
            );
//            $locations=Utils::curl_token('location/chaincity/',$location_param,$common['user']['token']);

            if($request['version']=='free'){
                $locations=Utils::curl('location/chainfreecity/',$location_param);
            }
            else{
                $locations=Utils::curl_token('location/chaincity/',$location_param,$common['user']['token']);
            }
            $locations=json_decode($locations,true);
            foreach ($locations as $continent){
                if($continent_id==$continent['id']){
                    $countries=$continent['countries'];
                    foreach ($countries as $countrie){
                        if($country_id==$countrie['id']){
                            $cities=$countrie['cities'];
                        }
                    }
                }
            }
            if($cities){
                return ApiResponse::makeResponse(true, $cities, ApiResponse::SUCCESS_CODE);
            }
            else{
                return ApiResponse::makeResponse(false, ApiResponse::$errorMassage[ApiResponse::UNKNOW_ERROR], ApiResponse::UNKNOW_ERROR);
            }
        }
        else{
            return ApiResponse::makeResponse(false, ApiResponse::$errorMassage[ApiResponse::MISSING_PARAM], ApiResponse::MISSING_PARAM);
        }
    }

    //查询支付二维码状态接口
    public function getQrcodeState(Request $request){
        $request=$request->all();
        $common=$request['common'];
        if(array_key_exists('nowTime',$request)&&array_key_exists('orderId',$request)){
            $param=array(
                'nowTime'=>$request['nowTime'],
                'orderId'=>$request['orderId'],
            );
            $state=Utils::curl_token('pay/getQrcodeState/',$param,$common['user']['token'],1);
            $state=json_decode($state,true);
            if($state){
                return ApiResponse::makeResponse(true, $state, ApiResponse::SUCCESS_CODE);
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