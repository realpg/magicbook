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
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndexController extends  Controller{
    //首页
    public function index(Request $request){
        $request=$request->all();
        $common=$request['common'];
        $menu='index';
        $subsection='index';
        $param=array(
            'common'=>$common,
            'menu'=>$menu,
            'subsection'=>$subsection,
        );
        return view('home.index.index',$param);
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
            $locations=Utils::curl_token('location/chaincity/',$location_param,$common['user']['token']);
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
            $locations=Utils::curl_token('location/chaincity/',$location_param,$common['user']['token']);
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
}