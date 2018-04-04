<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/1
 * Time: 10:15
 */

namespace App\Http\Middleware;

use App\Components\Utils;
use App\Http\Controllers\ApiResponse;
use Closure;

class WebBase
{
    public function handle($request, Closure $next)
    {
//        $common_param=array();
//        $common=Utils::curl('magic/index/',$common_param);
//        $common=json_decode($common,true);
        $common['user']=$request->cookie('user');
        $request['common']=$common;
        return $next($request);
    }
}