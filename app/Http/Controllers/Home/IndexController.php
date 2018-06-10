<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cache;

class IndexController extends Controller
{
    //首页
    public function index()
    {
        $article = Article::select('id', 'category_id', 'author', 'title', 'content', 'describe','created_at')
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
        $config = cache('common:config');
        $tdk = [
            'title'=>$config->get('WEB_TITLE'),
            'desc'=>$config->get('WEB_DESCRIPTION'),
            'keyword'=>$config->get('WEB_KEYWORDS'),
        ];

        $assign = ['tdk'=>$tdk, 'article'=>$article, 'tagName'=>'','category_id' => 'index'];
        return view('home/index/index', $assign);
    }

    // 文章详情页
    public function article(Request $request, $id)
    {
        echo $id;
    }
}
