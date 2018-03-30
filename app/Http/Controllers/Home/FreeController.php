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
        $param=array();
        return view('home.free.spot', $param);
    }
    public function childspot(Request $request){
        $request=$request->all();
        $common=$request['common'];
        $param=array();
        return view('home.free.childspot', $param);
    }
}