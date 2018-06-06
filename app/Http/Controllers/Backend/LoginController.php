<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'except'=>['index','store']
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
            'password' => 'required',
            'captcha' => 'required|captcha'
        ]);
        $data['is_admin'] = 1;
        unset($data['captcha']);
        if(Auth::attempt($data)){
            $user = Auth::user();
            $storeData['backend'] = ['email'=>$user->email, 'name'=>$user->name, 'is_admin'=>$user->is_admin];
            session($storeData);
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
        session()->forget('backend');
        session()->flash('success', '您已成功退出！');
        return redirect()->route('back.login');
    }
}
