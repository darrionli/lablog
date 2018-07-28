<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <title>@yield('title')@if(request()->path() !== '/') - {{ $config['WEB_TITLE'] }} @endif</title>
        <meta name="keywords" content="@yield('keywords')" />
        <meta name="description" content="@yield('description')" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <meta name="author" content="baijunyao,{{ htmlspecialchars_decode($config['ADMIN_EMAIL']) }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/home/style.css?v=1.0">
        @yield('css')
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-md fixed-top navbar-default topnav">
                <div class="container">
                    <div class="navbar-header mr-2">
                        <a href="/" class="navbar-brand">
                            李迪博客
                        </a>
                    </div>

                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsList" aria-controls="navbarsList" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarsList">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item @if($category_id == 'index') active @endif">
                                <a class="nav-link" href="/">首页</a>
                            </li>
                            @foreach($category as $v)
                                <li class="nav-item @if($v->id == $category_id) active @endif">
                                    <a class="nav-link" href="{{ url('category/'.$v->id) }}">
                                        {{ $v->name }}
                                    </a>
                                </li>
                            @endforeach
                            <li class="nav-item @if($category_id == 'about') active @endif">
                                <a class="nav-link" href="{{ route('home.about') }}">关于</a>
                            </li>
                        </ul>
                    </div>
                    @if(session('home.uid'))
                        <div>
                            <img style="height: 40px;" class="avatar-topnav" alt="{{ session('home.name') }}" src="{{ session('home.avatar') }}">
                            <span>{{ session('home.name') }}</span> | 
                            <span><a href="{{ route('oauth.logout') }}">退出</a></span>
                        </div>

                    @else
                    <a id="oAuthLogin" class="btn btn-outline-info" href="javascript:void(0);">登录</a>
                    @endif
                </div>
            </nav>
        </header>
        <div class="text-center" id="to-top" style="display: none;">
            <i class="fa fa-chevron-up" id="btn-top" title="回到顶部"></i>
        </div>
        <main role="main" class="container">
            <div class="row">
                <!-- left -->
                <div class="col-lg-9">
                    @yield('content')
                </div>

                <!-- right -->
                <div class="col-lg-3" style="padding-left: 1px; padding-right: 1px;">
                    <!-- 整站搜索 -->
                    <div class="d-none d-lg-block">
                        <div class="card border-0 rounded-0 px-3 mb-2 mb-md-3">
                            <div class="card-body px-0 py-3">
                                <form class="form-inline">
                                    <div class="input-group">
                                        <input type="search" name="q" class="form-control rounded-0 f-15" placeholder="Search" aria-label="Search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-info rounded-0" type="submit"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- 置顶推荐 -->
                    <div class="card border-0 rounded-0 px-3 mb-2 mb-md-3" id="top-article">
                        <div class="card-header bg-white px-0">
                            <strong><i class="fa fa-book mr-2 f-17"></i>置顶推荐</strong>
                        </div>

                        <ul class="list-group list-group-flush f-14">
                            @foreach($topArticle as $v)                            
                                <li class="list-group-item d-flex justify-content-between align-items-center pr-2 py-2">
                                    <a class="category-item" href="{{ url('article', [$v->id]) }}" title="{{ $v->title }}">{{ $v->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- 标签云 -->
                    <div class="card border-0 rounded-0 px-3 mb-2 mb-md-3" id="label-clound">
                        <div class="card-header bg-white px-0">
                            <strong><i class="fa fa-tags mr-2 f-17"></i>标&nbsp;签&nbsp;云</strong>
                        </div>
                        <div class="card-body px-0 py-3">
                            <div class="tag-cloud">
                                <?php $tag_i = 0; ?>
                                @foreach($labels as $v)
                                    <?php $tag_i++; ?>
                                    <?php $tag_i=$tag_i==5?1:$tag_i; ?>
                                    <a href="{{ url('tag', [$v->id]) }}" class="tags f-14" id="tag-{{ $tag_i }}">{{ $v->name }} ({{ $v->articles_count }})</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- 友情链接 -->
                    <div class="d-none d-lg-block" id="friends-link">
                        <div class="card border-0 rounded-0 px-3 mb-2 mb-md-3">
                            <div class="card-header bg-white px-0">
                                <strong><i class="fa fa-link mr-2 f-17"></i>友情链接</strong>
                            </div>
                            <div class="card-body px-0 py-3">
                                <div class="tool-list">
                                    @foreach($friendshipLink as $v)
                                        <div class="w-50 float-left mb-2">
                                            <div class="mx-2">
                                                <a href="{{ $v->url }}" title="{{ $v->name }}" target="_blank">{{ $v->name }}</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <span>Copyright © 2018 <a href="http://lidicode.com/">李迪博客</a></span> | 
                        <span><a href="http://www.miibeian.gov.cn/" target="_blank">@if(!empty($config['WEB_ICP_NUMBER'])) {{ $config['WEB_ICP_NUMBER'] }} @endif</a></span> | 
                        <span><img src="/images/home/beian.png"><a href="http://www.beian.gov.cn/portal/registerSystemInfo" target="_blank">京公网安备 11011202001314号</a></span>
                    </div>
                    <div class="col-sm-12">
                        @if(!empty($config['ADMIN_EMAIL']))
                            <span>联系邮箱：{!! $config['ADMIN_EMAIL'] !!}</span>
                        @endif
                        <!-- cnzz统计开始 -->
                        <span>{!! htmlspecialchars_decode($config['WEB_STATISTICS']) !!}</span>
                        <!-- cnzz统计结束 -->
                    </div>
                </div>
            </div>
        </div>

        {{--登录modal--}}
        <div id="oAuthModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="oAuthModalLiveLabel" data-filtered="filtered" aria-hidden="true">
            <div class="modal-dialog" role="document" data-filtered="filtered">
                <div class="modal-content" data-filtered="filtered">
                    <div class="modal-header" data-filtered="filtered">
                        <h1 class="modal-title" id="oAuthModalLiveLabel" data-filtered="filtered">登录</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-filtered="filtered">
                            <span aria-hidden="true" data-filtered="filtered">×</span>
                        </button>
                    </div>
                    <div class="modal-body" data-filtered="filtered">
                        <a href="{{ route('oauth.weibo.login') }}"><img src="/images/home/sina-login.png" alt="微博登录"></a>
                        <a href="" style="float: right;"><img src="/images/home/qq-login.png" alt="QQ登录"></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.bootcss.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        @yield('js')
        <script type="text/javascript" src="/js/home/lidicode.js?v=1.0"></script>
        <script>
            $(function(){
                $("#oAuthLogin").on('click', function(){
                    $("#oAuthModal").modal();
                })
            })
        </script>
    </body>
</html>
