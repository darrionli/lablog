<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 网站配置项
     */
    public function index()
    {
        return view('backend.config.index');
    }

    /**
     * 修改配置
     */
    public function store(Request $request)
    {

    }
}
