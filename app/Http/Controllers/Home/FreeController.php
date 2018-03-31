<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/29
 * Time: 9:37
 */

namespace App\Http\Controllers\Home;

use App\Components\Utils;
use App\Http\Controllers\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FreeController extends Controller{
    const PAGE_SIZE=10;
    public function city(Request $request){
        $request=$request->all();
        $common=$request['common'];
        $param=array();
        return view('home.free.city', $param);
    }
    public function spot(Request $request){
        $request=$request->all();
        $common=$request['common'];
        $request['code']="A0DC47FD1BA63DA48C4694FE51E79837";    //测试
        if(array_key_exists('code',$request)){
            if(array_key_exists('name',$request)){
                $name=$request['name'];
            }
            else{
                $name='魔法路书';
            }
            $code=$request['code'];
            $scene_param=array(
                'code'=>$code
            );
            $scenes=Utils::curl('location/scene',$scene_param);
            $scenes=json_decode($scenes,true);
//            dd($scenes);
            if(array_key_exists('count',$scenes)){
                $param=array(
                    'result'=>true,
                    'common'=>$common,
                    'scenes'=>$scenes,
                    'code'=>$code,
                    'name'=>$name
                );
            }
            else{
                $param=array(
                    'result'=>false,
                    'common'=>$common,
                    'msg'=>'参数无效！'
                );
            }
        }
        else{
            $param=array(
                'result'=>false,
                'common'=>$common,
                'msg'=>'缺少参数，获取数据失败！'
            );
        }
        return view('home.free.spot', $param);
    }
    public function childspot(Request $request){
        $request=$request->all();
        $common=$request['common'];
        if(array_key_exists('code',$request)&&array_key_exists('scene_id',$request)){
            $code=$request['code'];
            $scene_id=$request['scene_id'];
            $subscene_param=array(
                'code'=>$code,
                'scene_id'=>$scene_id
            );
            $subscenes=Utils::curl('location/subscene',$subscene_param);
            $subscenes=json_decode($subscenes,true);
//            dd($subscenes);
            if(array_key_exists('count',$subscenes)){
                $subscenes_array=json_encode($subscenes['results']);
                $param=array(
                    'result'=>true,
                    'common'=>$common,
                    'subscenes'=>$subscenes,
                    'subscenes_array'=>$subscenes_array,
                    'code'=>$code,
                );
            }
            else{
                $param=array(
                    'result'=>false,
                    'common'=>$common,
                    'msg'=>'参数无效！'
                );
            }
        }
        else{
            $param=array(
                'result'=>false,
                'common'=>$common,
                'msg'=>'缺少参数，获取数据失败！'
            );
        }
        return view('home.free.childspot', $param);
    }
}