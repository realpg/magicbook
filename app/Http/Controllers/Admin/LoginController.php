<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/10
 * Time: 14:18
 */

namespace App\Http\Controllers\Admin;

use App\Components\AdminManager;
use App\Components\Utils;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Components\RequestValidator;


class LoginController
{
    //首页
    public function Login(Request $request)
    {
        $param=array(
            'msg'=>'',
        );
        return view('admin.login.login',$param);
    }

    //登录验证
    public function LoginDo(Request $request){
        $data = $request->all();
//        var_dump($data);
        if(array_key_exists('username',$data)&&array_key_exists('password',$data)){
            $username = $data['username'];
            $password = $data['password'];
            $param=array(
                'username'=>$username,
                'password'=>$password
            );
            $admin=Utils::curl('auth/login/',$param,1);
            $admin=json_decode($admin,true);
//            dd($admin);
            if($admin){
                if(array_key_exists('detail',$admin)){
                    return view('admin.login.login', ['msg' => $admin['detail']]);
                }
                else{
                    $request->session()->put('admin', $admin);//写入session
                    return redirect('/admin/index');//跳转至后台首页
                }
            }
            else{
                return view('admin.login.login', ['msg' => ApiResponse::UNKNOW_ERROR]);
            }
//                $admin = AdminManager::login($username);
//                //登录失败
//                if ($admin == null) {
//                    return view('admin.login.login', ['msg' => '手机号错误']);
//                }
//                else{
//                    if($password!=$admin['password']){
//                        return view('admin.login.login', ['msg' => '密码错误']);
//                    }
//                    else{
//                        unset($admin['password']);
//                    }
//                }
//                $request->session()->put('admin', $admin);//写入session
//                return redirect('/admin/index');//跳转至后台首页
        }
        else{
            return view('admin.login.login', ['msg' => '请输入用户名和密码']);
        }
    }

    //退出登录
    public function loginout(Request $request){
        $request->session()->forget('admin');
        $request->session()->flush();
        return redirect('/admin/login');//跳转至后台首页
    }
}