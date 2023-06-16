<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Utilities\Constant;

class HomeController extends Controller
{
    public function getLogin(){
        if(Auth::check()){
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function postlogin(Request $request){
        $checklogins = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => [Constant::user_level_host, Constant::user_level_admin], //Tài khoản cấp độ host or admin
        ];

        $remember = $request->remember;

        //sử dụng Auth::attempt() của Laravel để xác thực tài khoản đăng nhập
        if (Auth::attempt($checklogins, $remember)){
            return redirect('admin/dashboard');//mac dinh la trang chu
        } else {
            return back()->with('notification', 'ERROR: Email hoặc mật khẩu không đúng!');
        }
    }

    public function logout(){
        Auth::logout();

        return redirect('admin/login');
    }
}
