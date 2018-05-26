<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest',[
            'only'=>['index','store']
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 登录页面
     */
    public function index()
    {
        return view('backend.login');
    }

    /**
     * 登录
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);
        $data['is_admin'] = 1;

        if(Auth::attempt($data)){
            session()->flash('success', '欢迎回来！');
            return redirect()->route('back.home');
        }else{
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back();
        }
    }

    /**
     * 退出登录
     */
    public function logout()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出！');
        return redirect()->route('back.login');
    }
}
