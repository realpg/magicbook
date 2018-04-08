<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/7
 * Time: 20:30
 */

namespace App\Http\Controllers\Admin;

use App\Components\Utils;
use App\Http\Controllers\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuditionController extends Controller
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
        //获取试听数据列表
        if(array_key_exists('version',$data)){
            $version=$data['version'];
        }
        else{
            $version=null;
        }
        if(array_key_exists('view_order',$data)){
            $view_order=$data['view_order'];
        }
        else{
            $view_order=1;
        }
        if(array_key_exists('search',$data)){
            $search=$data['search'];
        }
        else{
            $search=null;
        }
        $param=array(
            'version'=>$version,
            'view_order'=>$view_order,
            'search'=>$search,
            'page_size'=>self::PAGE_SIZE,
            'page'=>$page
        );
        $datas=Utils::curl_token('payment/purchase/',$param,$admin['token']);
        $datas=json_decode($datas,true);
//        dd($datas);
        //版本列表
        $versions=Utils::curl('magic/version/',false);
        $versions=json_decode($versions,true);
        //////
        $url=Utils::URL;
        //赋值
        $data=array(
            'admin'=>$admin,
            'versions_array'=>$versions,
            'version'=>$version,
            'view_order'=>$view_order,
            'search'=>$search,
            'datas'=>$datas,
            'page'=>$page,
            'url'=>$url,
        );
        return view('admin.audition.index', $data);
    }
    //批量删除
    public function delDo(Request $request)
    {
        $data=$request->all();
        $admin = $request->session()->get('admin');
        if(array_key_exists('id_array',$data)){
            $id_array=$data['id_array'];
            $param=array(
                'ids'=>$id_array
            );
            $result=Utils::curl_token('payment/bulkDeletePurchase/',$param,$admin['token'],1);
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