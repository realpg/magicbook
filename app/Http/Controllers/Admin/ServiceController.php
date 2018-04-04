<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/4
 * Time: 16:08
 */

namespace App\Http\Controllers\Admin;

use App\Components\Utils;
use App\Http\Controllers\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function edit(Request $request){
        $admin = $request->session()->get('admin');
        $request=$request->all();
        $data=Utils::curl('m/agreement/');
        $data=json_decode($data,true);
        //赋值
        $data=array(
            'admin'=>$admin,
            'data'=>$data,
        );
        return view('admin.service.edit', $data);
    }
    //编辑执行
    public function editDo(Request $request){
        $admin = $request->session()->get('admin');
        $request=$request->all();
        $param=array(
            'content'=>$request['content'],
        );
        $result=Utils::curl_token('m/agreement/1/',$param,$admin['token'],2);
        if($result){
            return ApiResponse::makeResponse(true, $result, ApiResponse::SUCCESS_CODE);
        }
        else{
            return ApiResponse::makeResponse(false, $result['detail'], ApiResponse::UNKNOW_ERROR);
        }
    }
}