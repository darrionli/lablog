<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Category;
use App\Models\Config;
use App\Models\Label;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cache;

/**
 * Class BaseController
 * @package App\Http\Controllers\Home
 * 前台应用基类
 */
class BaseController extends Controller
{
    // 缓存时间
    const BASE_CACHE_TIME = 21600;

    // 通用缓存
    protected $commonCache = [];

    public function __construct()
    {
        // 网站配置项
        $config = Cache::remember('common:config', $this->getCacheTime(), function(){
            return Config::pluck('val', 'name');
        });

        // 分类
        $category = Cache::remember('common:category', $this->getCacheTime(), function(){
            return Category::select('id', 'name')->orderBy('sort')->get();
        });

        // 标签
        $labels = Cache::remember('common:label', $this->getCacheTime(), function(){
            return Label::select('id', 'name')->get();
        });

        // 置顶文章
        $topArticle = Cache::remember('common:topArticle', $this->getCacheTime(), function(){
            return Article::select('id', 'title')
                ->where('is_top', 1)
                ->orderBy('created_at', 'desc')
                ->get();
        });

        // 友情链接
        $friendshipLink = [];

        $this->commonCache = [
            'config'            =>  $config,
            'category'          =>  $category,
            'label'             =>  $labels,
            'topArticle'        =>  $topArticle,
            'friendshipLink'    =>  $friendshipLink
        ];
    }

    /**
     * @return int
     * 获取缓存时间
     */
    private function getCacheTime()
    {
        return self::BASE_CACHE_TIME + mt_rand(600, 3600);
    }
}
