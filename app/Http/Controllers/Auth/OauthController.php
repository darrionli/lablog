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

    // qq登录
    public function qqLogin(){
        $config = cache('common:config');
        $params = [];
        $params['client_id'] = $config->get('QQ_APP_ID');
        $params['redirect_uri'] = 'http://www.lidicode.com/oauth/redirect_qq';
        $params['response_type'] = 'code';
        $params['state'] = 3306;
        $orizeUrl = "https://graph.qq.com/oauth2.0/authorize?" . http_build_query($params);
        header("location:{$orizeUrl}");
        exit();
    }

    // qq回调
    public function callback_qq(Request $request)
    {
        $code = $request->input('code');
        $state = $request->input('state');
        if(empty($code) || empty($state)){
            return redirect()->route('home.index');
        }
        if($state!=3306){
            return abort(404);
        }
        $config = cache('common:config');
        $params = [
            'grant_type'=>'authorization_code',
            'client_id'=>$config->get('QQ_APP_ID'),
            'client_secret'=>$config->get('QQ_APP_KEY'),
            'code'=>$code,
            'redirect_uri'=>'http://www.lidicode.com/oauth/redirect_qq'
        ];
        $url = "https://graph.qq.com/oauth2.0/token?" . http_build_query($params);
        $request_token = post_req($url, $params);
        if($request_token){
            $token = explode("&", $request_token);
            $token_array = explode("=", $token[0]);
            $access_token = isset($token_array[1]) ? $token_array[1] : '';
            if(!$access_token){
                return redirect()->route('home.index');
            }
            // 获取用户openid
            $para = [];
            $para['access_token'] = $access_token;
            $url = "https://graph.qq.com/oauth2.0/me?" . http_build_query($para);
            $userinfo = http_request($url, '', 'GET');
            if($userinfo[1]!=200){
                return redirect()->route('home.index');
            }
            $openarr = explode(" ", $userinfo[0]);
            $open = json_decode($openarr[1], true);
            $openid = isset($open['openid']) ? $open['openid'] :'';
            if(!$openid){
                return redirect()->route('home.index');
            }
            // 获取用户信息
            $params = [];
            $params['access_token'] = $access_token;
            $params['oauth_consumer_key'] =$config->get('QQ_APP_ID');
            $params['openid'] = $openid;
            $url = "https://graph.qq.com/user/get_user_info?" . http_build_query($params);
            $userdata = http_request($url, '', 'GET');
            if($userdata[1] != 200){
                return abort(404);
            }
            $qq = json_decode($userdata[0], true);
            $data = [];
            $data['name'] = $qq['nickname'];
            $data['avatar'] = $qq['figureurl_qq_2'];
            $ret = Oauth_user::where(['openid'=>$openid, 'type'=>1])->first();
            if($ret){
                $data['login_times'] = time();
                Oauth_user::where(['openid'=>$openid, 'type'=>1])->update($data);
            }else{
                $data['type'] = 1;
                $data['openid'] = $openid;
                $data['login_times'] = time();
                Oauth_user::create($data);
            }
            $storeData['home'] = ['name'=>$data['name'], 'avatar'=>$data['avatar']];
            session($storeData);
            return redirect()->route('home.index');
        }else{
            return redirect()->route('home.index');
        }
    }

    // 退出登录
    public function logout()
    {
        session()->forget('home');
        session()->flash('success', '您已成功退出！');
        return redirect()->route('home.index');
    }
}
