<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Config;
use App\Models\Label;
use Illuminate\Support\ServiceProvider;
use Cache;
use DB;

class AppServiceProvider extends ServiceProvider
{
    const CACHE_TIME = 21600;
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(!Cache::has('common:config')){
            $conf = Config::pluck('val', 'name');
            Cache::put('common:config', $conf,self::CACHE_TIME);
        }
        // 分配前台通用数据
        view()->composer('home/*', function($view){
            // 网站配置
            $config = Cache::remember('common:config', self::CACHE_TIME, function(){
                return Config::pluck('val', 'name');
            });

            // 获取分类
            $category = Cache::remember('common:category', self::CACHE_TIME, function(){
                return Category::select('id', 'name')->orderBy('sort')->get();
            });

            // 标签
            $labels = Cache::remember('common:label', self::CACHE_TIME, function(){
                return Label::select('id', 'name')->get();
            });

            // 置顶文章
            $topArticle = Cache::remember('common:topArticle', self::CACHE_TIME, function(){
               return Article::select('id', 'title')
                   ->where('is_top', 1)
                   ->orderBy('created_at', 'desc')
                   ->get();
            });

            // 友情链接
            $friendshipLink = [];

            $assign = compact('category', 'labels', 'topArticle', 'config', 'friendshipLink');
            $view->with($assign);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
