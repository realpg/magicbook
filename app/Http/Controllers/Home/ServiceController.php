<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/14
 * Time: 13:12
 */
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller{
    //服务条款
    public function show(Request $request){
        return view('home.service.show');
    }
}