<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'except'=>['index']
        ]);
    }

    public function index()
    {
        echo 123;
        //return view('layouts.backend.frame');
    }
}
