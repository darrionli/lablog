@extends('layouts.home.index')

@section('title', $tdk['title'])

@section('keywords', $tdk['keyword'])

@section('description', $tdk['desc'])

@section('css')
    <link rel="stylesheet" href="/editor/css/editormd.preview.css">
@stop

@section('content')
    <!-- 正文 -->
    <div class="card rounded-0 border-0" id="article">
        <div class="card-body px-2 px-md-3 pb-0">
            <div id="editormd-view" class="article-body f-17 markdown-body editormd-html-preview" style="line-height:1.8">
                <h3 id="h3-u5173u4E8Eu7F51u7AD9"><a name="关于网站" class="reference-link"></a><span class="header-link octicon octicon-link"></span>关于网站</h3><ul>
                    <li>网站采用Laravel + Bootstrap4搭建，部署在腾讯云上，源码在GitHub</li><li>搭建此站主要目的是分享学习心得与工作总结，如果你发现了错误还请及时指出，大家共同进步</li><li>目前仅实现博客的部分功能，其他功能后期会添上</li></ul>
                <h3 id="h3-u5173u4E8Eu535Au4E3B"><a name="关于博主" class="reference-link"></a><span class="header-link octicon octicon-link"></span>关于博主</h3><ul>
                    <li>GitHub：<a href="https://github.com/darrionli" title="https://github.com/darrionli">https://github.com/darrionli</a></li><li>Email: <a href="mailto:lidi0903@163.com">lidi0903@163.com</a></li></ul>
            </div>
        </div>
    </div>
@stop