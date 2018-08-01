<?php

namespace App\Http\Controllers\Auth;

use App\Models\Oauth_user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OauthController extends Controller
{
    // 微博登录入口，引导用户去授权页
    public function wbLogin()
    {
        $config = cache('common:config');
        $params = [];
        $params['client_id'] = $config->get('SINA_API_KEY');
        $params['redirect_uri'] = 'http://www.lidicode.com/oauth/redirect_weibo';
        $params['response_type'] = 'code';
        $orizeUrl = "https://api.weibo.com/oauth2/authorize?" . http_build_query($params);
        header("location:{$orizeUrl}");
        exit();
    }

    // 授权回调页
    public function callback_weibo(Request $request)
    {
        $code = $request->input('code');
        if(empty($code)){
            return abort(400);
        }
        $config = cache('common:config');
        $params = [];
        $params['client_id'] = $config->get('SINA_API_KEY');
        $params['client_secret'] = $config->get('SINA_SECRET');
        $params['grant_type'] = 'authorization_code';
        $params['code'] = $code;
        $params['redirect_uri'] = 'http://www.lidicode.com/oauth/redirect_weibo';
        $url = "https://api.weibo.com/oauth2/access_token?" . http_build_query($params);
        $response = post_req($url, $params);
        if(empty($response)){
            return abort(404);
        }
        $token = json_decode($response, true);
        // 获取用户信息
        $para = [];
        $para['access_token'] = $token['access_token'];
        $para['uid'] = $token['uid'];
        $url = "https://api.weibo.com/2/users/show.json?" . http_build_query($para);
        $info = http_request($url, '', 'GET');
        if($info[1] != 200){
            return abort(404);
        }
        $userinfo = json_decode($info[0], true);
        $data = [];
        $data['name'] = $userinfo['name'];
        $data['avatar'] = $userinfo['profile_image_url'];
        $ret = Oauth_user::where(['openid'=>$token['uid'], 'type'=>2])->first();
        if($ret){
            $data['access_token'] = $token['access_token'];
            $data['login_times'] = time();
            Oauth_user::where(['openid'=>$token['uid'], 'type'=>2])->update($data);
        }else{
            $data['type'] = 2;
            $data['openid'] = $token['uid'];
            $data['access_token'] = $token['access_token'];
            $data['login_times'] = time();
            Oauth_user::create($data);
        }
        $storeData['home'] = ['token'=>$token['access_token'], 'uid'=>$token['uid'], 'name'=>$data['name'], 'avatar'=>$data['avatar']];
        session($storeData);
        return redirect()->route('home.index');
    }

    // 退出登录
    public function logout()
    {
        session()->forget('home');
        session()->flash('success', '您已成功退出！');
        return redirect()->route('home.index');
    }
}
