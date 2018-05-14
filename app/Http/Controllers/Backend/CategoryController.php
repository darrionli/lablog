<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    // 分类列表
	public function index()
	{
		$category = Category::all();
		dd($category);
	}
}
