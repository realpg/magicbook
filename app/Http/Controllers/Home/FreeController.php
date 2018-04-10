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
    public function spot(Request $request){
        $request=$request->all();
        $common=$request['common'];
        $name='魔法路书';
        $logo='';
        $slogan='';
        if(array_key_exists('code',$request)){
            $code=$request['code'];
            $scene_param=array(
                'code'=>$code
            );
            $scenes=Utils::curl('location/scene',$scene_param);
            $scenes=json_decode($scenes,true);
            if(array_key_exists('city_name',$scenes)&&$scenes['city_name']){
                $name=$scenes['city_name'];
            }
            if(array_key_exists('logo',$scenes)&&$scenes['logo']){
                $logo=$scenes['logo'];
            }
            if(array_key_exists('slogan',$scenes)&&$scenes['slogan']){
                $slogan=$scenes['slogan'];
            }
            if(array_key_exists('count',$scenes)){
                $param=array(
                    'result'=>true,
                    'common'=>$common,
                    'scenes'=>$scenes,
                    'code'=>$code,
                    'name'=>$name,
                    'logo'=>$logo,
                    'slogan'=>$slogan,
                );
            }
            else{
                $param=array(
                    'result'=>false,
                    'common'=>$common,
                    'code'=>'',
                    'name'=>$name,
                    'msg'=>'参数无效！',
                    'logo'=>$logo,
                    'slogan'=>$slogan,
                );
            }
        }
        else{
            $param=array(
                'result'=>false,
                'common'=>$common,
                'code'=>'',
                'name'=>$name,
                'logo'=>$logo,
                'slogan'=>$slogan,
                'msg'=>'缺少参数，获取数据失败！'
            );
        }
        return view('home.free.spot', $param);
    }
    public function childspot(Request $request){
        $request=$request->all();
        $common=$request['common'];
        $logo='';
        $slogan='';
        if(array_key_exists('code',$request)&&array_key_exists('scene_id',$request)){
            $code=$request['code'];
            $scene_id=$request['scene_id'];
            $subscene_param=array(
                'code'=>$code,
                'scene_id'=>$scene_id
            );
            $subscenes=Utils::curl('location/subscene',$subscene_param);
            $subscenes=json_decode($subscenes,true);
            if(array_key_exists('logo',$subscenes)&&$subscenes['logo']){
                $logo=$subscenes['logo'];
            }
            if(array_key_exists('slogan',$subscenes)&&$subscenes['slogan']){
                $slogan=$subscenes['slogan'];
            }
//            dd($subscenes);
            if($subscenes){
                if(array_key_exists('count',$subscenes)){
                    $subscenes_array=json_encode($subscenes['results']);
                    $param=array(
                        'result'=>true,
                        'common'=>$common,
                        'subscenes'=>$subscenes,
                        'subscenes_array'=>$subscenes_array,
                        'name'=>$subscenes['scene']['name'],
                        'code'=>$code,
                        'logo'=>$logo,
                        'slogan'=>$slogan,
                    );
                }
                else{
                    $param=array(
                        'result'=>false,
                        'common'=>$common,
                        'code'=>'',
                        'name'=>'',
                        'logo'=>$logo,
                        'slogan'=>$slogan,
                        'msg'=>'参数无效！'
                    );
                }
            }
            else{
                $param=array(
                    'result'=>false,
                    'common'=>$common,
                    'code'=>'',
                    'name'=>'',
                    'logo'=>$logo,
                    'slogan'=>$slogan,
                    'msg'=>'参数无效！'
                );
            }
        }
        else{
            $param=array(
                'result'=>false,
                'common'=>$common,
                'code'=>'',
                'name'=>'',
                'logo'=>$logo,
                'slogan'=>$slogan,
                'msg'=>'缺少参数，获取数据失败！'
            );
        }
        return view('home.free.childspot', $param);
    }
}