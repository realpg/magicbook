<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/4
 * Time: 10:33
 */

namespace App\Http\Controllers\Admin;

use App\Components\Utils;
use App\Http\Controllers\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VersionController extends Controller
{
    //首页
    public function index(Request $request)
    {
        $data=$request->all();
        $admin = $request->session()->get('admin');
        $param=array();
        $datas=Utils::curl_token('magic/version/',$param,$admin['token']);
        $datas=json_decode($datas,true);
        //赋值
        $data=array(
            'admin'=>$admin,
            'datas'=>$datas,
        );
        return view('admin.version.index', $data);
    }
    //编辑
    public function edit(Request $request)
    {
        $admin = $request->session()->get('admin');
        $request=$request->all();
        $data=Utils::curl('magic/version/'.$request['code'].'/');
        $data=json_decode($data,true);
        //赋值
        $data=array(
            'admin'=>$admin,
            'data'=>$data,
        );
        return view('admin.version.edit', $data);
    }
    //编辑执行
    public function editDo(Request $request){
        $admin = $request->session()->get('admin');
        $request=$request->all();
        if(array_key_exists('code',$request)){
            $param=array(
                'name'=>$request['name'],
                'can_preview_page'=>$request['can_preview_page'],
                'can_customize_city'=>$request['can_customize_city'],
                'can_customize_logo'=>$request['can_customize_logo'],
                'valid_days'=>$request['valid_days'],
                'price'=>$request['price']*100,
            );
            $result=Utils::curl_token('m/version/'.$request['code'].'/',$param,$admin['token'],2);
            if($result){
                return ApiResponse::makeResponse(true, $result, ApiResponse::SUCCESS_CODE);
            }
            else{
                return ApiResponse::makeResponse(false, $result['detail'], ApiResponse::UNKNOW_ERROR);
            }
        }
        else{
            return ApiResponse::makeResponse(false, ApiResponse::$errorMassage[ApiResponse::MISSING_PARAM], ApiResponse::MISSING_PARAM);
        }
    }
}