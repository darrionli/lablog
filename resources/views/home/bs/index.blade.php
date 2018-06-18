@extends('layouts.home.index')

@section('title', $tdk['title'])

@section('keywords', $tdk['keyword'])

@section('description', $tdk['desc'])

@section('content')
<!-- 搜索目录 -->
@if(!empty($tagName))
    <div class="description bg-white px-3 pt-3 pb-1">
	    <p class="float-right mb-0">共<span class="mx-2 text-info">1</span>篇</p>
	    <h1 class="f-16"><strong>标签分类：{{ $tagName }}</strong></h1>
	    <p class="f-14">Linux 是目前公认的最好的开发环境，所以学习 Linux 对于编程来说非常有必要，这个节点就来分析 Linux 学习中遇到的问题和技巧。</p>
	</div>
	<div class="py-2"></div>
@endif
@if(request()->has('wd'))
    <div class="description bg-white px-3 pt-3 pb-1">
	    <p class="float-right mb-0">共<span class="mx-2 text-info">1</span>篇</p>
	    <h1 class="f-16"><strong>搜索到与：{{ request()->input('wd') }}相关的文章</strong></h1>
	    <p class="f-14">Linux 是目前公认的最好的开发环境，所以学习 Linux 对于编程来说非常有必要，这个节点就来分析 Linux 学习中遇到的问题和技巧。</p>
	</div>
	<div class="py-2"></div>
@endif

<!-- 文章列表 -->
<div class="art-list">
	@foreach($article as $k => $v)
    <div class="media mb-1 mb-sm-3 p-2 p-lg-3">
        <div class="align-self-center mr-2 mr-lg-3 w-25 modal-open">
            <a href="{{ url('article', [$v->id]) }}" target="_blank">
                <img class="w-100 article-img" src="{{ $v->cover }}" alt="{{ $v->title }}">
            </a>
        </div>
        <div class="media-body">
            <div class="text-muted mb-2 f-12">
                <img class="avatar" src="/images/home/avatar.jpg" alt="{{ $v->author }}">
                <span>{{ $v->author }}</span>
                <span><i class="fa fa-calendar-times-o ml-2 mr-1"></i>{{ $v->created_at }}</span>
            </div>
            <h2 class="mt-0 font-weight-bold text-info f-17">
                <a href="{{ url('article', [$v->id]) }}" target="_blank">{{ $v->title }}</a>
            </h2>
            <p class="d-none d-sm-block mb-2 f-14">{{ $v->describe }}.</p>
            <p class="d-block d-sm-none mb-2 f-14">{{ $v->describe }}</p>
            <div class="text-muted mb-0 f-12 float-right">
                <a class="cate mr-2" href="{{ url('category', [$v->category->id]) }}" title="查看当前分类下更多文章">
                    <i class="fa fa-book mr-1"></i>{{ $v->category->name }}
                </a>
                <span class="mr-2"><i class="fa fa-eye ml-2 mr-1"></i>{{ $v->readed }}</span>
                {{--<a href="/article/python-ssh/#comment-block" target="_blank" title="查看文章评论">--}}
                    {{--<i class="fa fa-comments ml-2 mr-1"></i>6--}}
                {{--</a>--}}
            </div>
        </div>
    </div>
    @endforeach
</div>
<div id="page">
    {{ $article->links() }}
</div>

@stop