<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Config;
use App\Http\Controllers\Controller;

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
    public function store(Request $request)
    {

    }
}
