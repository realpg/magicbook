<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/20
 * Time: 21:14
 */

namespace App\Http\Controllers\Home;

use App\Components\Utils;
use App\Http\Controllers\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class SignController extends Controller
{
    //登录
    public function signIn(Request $request){
        $request=$request->all();
        $common=$request['common'];
        $menu='sign';
        $param=array(
            'common'=>$common,
            'menu'=>$menu
        );
        return view('home.sign.in',$param);
    }
    //登录执行
    public function signInDo(Request $request){
        $request=$request->all();
        if(array_key_exists('mobile',$request)&&array_key_exists('password',$request)){
            $sign_in_param=array(
                'mobile'=>$request['mobile'],
                'password'=>$request['password'],
            );
            $sign_in_info=Utils::curl('u/login/',$sign_in_param,1);
            $sign_in_info=json_decode($sign_in_info,true);
//            dd($sign_in_info);
            if($sign_in_info){
                if(array_key_exists('detail',$sign_in_info)&&!array_key_exists('id',$sign_in_info)){
                    return ApiResponse::makeResponse(false, $sign_in_info['detail'], ApiResponse::UNKNOW_ERROR);
                }
                else{
                    Cookie::queue('user', $sign_in_info);
                    return ApiResponse::makeResponse(true, $sign_in_info, ApiResponse::SUCCESS_CODE);
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
    //注册
    public function signUp(Request $request){
        $request=$request->all();
        $common=$request['common'];
        $menu='sign';
        $businesses_param=array();
        $businesses=Utils::curl('u/business/',$businesses_param);
        $businesses=json_decode($businesses,true);
        $param=array(
            'common'=>$common,
            'menu'=>$menu,
            'businesses'=>$businesses,
        );
        return view('home.sign.up',$param);
    }
    //注册执行
    public function signUpDo(Request $request){
        $request=$request->all();
        if(array_key_exists('username',$request)&&array_key_exists('mobile',$request)&&array_key_exists('company',$request)&&array_key_exists('agreement_checked',$request)){
            if(array_key_exists('businesses',$request)){
                $sign_up_param=array(
                    'username'=>$request['username'],
                    'mobile'=>$request['mobile'],
                    'company'=>$request['company'],
                    'businesses'=>json_encode($request['businesses'],true),
                    'agreement_checked'=>$request['agreement_checked']=='on'?true:false,
                );
            }
            else{
                $sign_up_param=array(
                    'username'=>$request['username'],
                    'mobile'=>$request['mobile'],
                    'company'=>$request['company'],
                    'agreement_checked'=>$request['agreement_checked']=='on'?true:false,
                );
            }
            $sign_up_info=Utils::curl('user/',$sign_up_param,1);
            $sign_up_info=json_decode($sign_up_info,true);
            if($sign_up_info){
                if(array_key_exists('detail',$sign_up_info)&&!array_key_exists('id',$sign_up_info)){
                    return ApiResponse::makeResponse(false, $sign_up_info['detail'], ApiResponse::UNKNOW_ERROR);
                }
                else{
                    return ApiResponse::makeResponse(true, $sign_up_info, ApiResponse::SUCCESS_CODE);
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
    //注册成功
    public function signSuccess(Request $request){
        $request=$request->all();
        $common=$request['common'];
        $menu='sign';
        $param=array(
            'common'=>$common,
            'menu'=>$menu
        );
        return view('home.sign.success',$param);
    }
    //退出
    public function signOut(Request $request){
        setcookie('user', '', -1, '/');
        return redirect('/');
    }
}