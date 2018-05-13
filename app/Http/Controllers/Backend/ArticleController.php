<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Article\Store;
use App\Models\Article;
use App\Models\Category;
use App\Models\Label;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    // 文章列表页
    public function index()
    {
        return view('backend.article.index');
    }

    // 添加文章
    public function create()
    {
        $category = Category::all();
        $label = Label::all();
        $assign = compact('category', 'label');
        return view('backend.article.create', $assign);
    }

    // 添加文章
    public function store(Store $request, Article $article)
    {
        // $article->
    }
}
