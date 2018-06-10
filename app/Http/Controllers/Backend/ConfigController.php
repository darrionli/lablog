<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Config;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Cache;

class ConfigController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 网站配置项
     */
    public function index()
    {
        $config = Config::pluck('val', 'name');
        $assign = compact('config');
        return view('backend.config.index', $assign);
    }

    /**
     * 修改配置
     */
    public function store(Request $request, Config $config)
    {
        $data = $request->except('_token');
        $result = $config->updatePatch($data);
        if($result){
            session()->flash('success', '更新成功');
        }else{
            session()->flash('danger', '更新失败');
        }
        return redirect()->route('back.config.index');
    }

    /**
     * 清理网站缓存
     */
    public function clear()
    {
//        Artisan::call('cache:clear');
        Cache::flush();
        session()->flash('success', '更新成功');
        return redirect()->back();
    }
}
