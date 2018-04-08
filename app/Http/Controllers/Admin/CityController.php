<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/4
 * Time: 17:06
 */

namespace App\Http\Controllers\Admin;

use App\Components\Utils;
use App\Http\Controllers\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{
    //首页
    public function index(Request $request)
    {
        $admin = $request->session()->get('admin');
        $datas=Utils::curl_token('location/undercontinent/freecity/',false,$admin['token']);
        $datas=json_decode($datas,true);
//        dd($datas);
        $chaincities=Utils::curl_token('location/chaincity/',false,$admin['token']);
        $chaincities=json_decode($chaincities,true);
        if(array_key_exists('detail',$chaincities)){
            $chaincities=array();
        }
        //赋值
        $data=array(
            'admin'=>$admin,
            'datas'=>$datas,
            'chaincities'=>$chaincities
        );
        return view('admin.city.index', $data);
    }

    //获取国家列表
    public function getCountries(Request $request){
        $admin = $request->session()->get('admin');
        $request=$request->all();
        if(array_key_exists('continent_id',$request)){
            $continent_id=$request['continent_id'];
            $locations=Utils::curl_token('location/chaincity/',false,$admin['token']);
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
        $admin = $request->session()->get('admin');
        $request=$request->all();
        if(array_key_exists('continent_id',$request)&&array_key_exists('country_id',$request)){
            $continent_id=$request['continent_id'];
            $country_id=$request['country_id'];
            $locations=Utils::curl_token('location/chaincity/',false,$admin['token']);
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

    //添加城市
    public function addDo(Request $request){
        $admin = $request->session()->get('admin');
        $request=$request->all();
        if(array_key_exists('city_id',$request)){
            $city_id=$request['city_id'];
            $param=array(
                'city_id'=>$city_id
            );
            $result=Utils::curl_token('location/freecity/',$param,$admin['token'],1);
            $result=json_decode($result,true);
            if($result){
                if(array_key_exists('detail',$result)){
                    return ApiResponse::makeResponse(false, $result['detail'], ApiResponse::UNKNOW_ERROR);
                }
                else{
                    return ApiResponse::makeResponse(true, $result, ApiResponse::SUCCESS_CODE);
                }
            }
        }
        else{
            return ApiResponse::makeResponse(false, ApiResponse::$errorMassage[ApiResponse::MISSING_PARAM], ApiResponse::MISSING_PARAM);
        }
    }

    //删除城市
    public function delDo(Request $request){
        $admin = $request->session()->get('admin');
        $request=$request->all();
        if(array_key_exists('id',$request)){
            $id=$request['id'];
            $result=Utils::curl_token('location/freecity/'.$id.'/',false,$admin['token'],3);
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