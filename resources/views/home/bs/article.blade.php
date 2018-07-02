@extends('layouts.home.index')

@section('title', $data->title)

@section('keywords', $data->keywords)

@section('description', $data->description)

@section('css')
<link rel="stylesheet" href="/editor/css/editormd.preview.css">
@stop


@section('content')
<!-- 正文 -->
<div class="card rounded-0 border-0" id="article">
    <div class="card-body px-2 px-md-3 pb-0">
        <h1 class="card-title text-center font-weight-bold text-info">{{ $data->title }}</h1>
        <hr>
        <div class="text-center f-13">

            <span class="mx-2" data-toggle="tooltip" data-placement="bottom">
                <i class="fa fa-calendar-times-o ml-2 mr-1"></i>
                {{ $data->created_at }}
            </span>

            <span class="mx-2">
                <i class="fa fa-eye ml-2 mr-1"></i>
                阅读 {{ $data->readed }}
            </span>
            {{--<a class="mx-2 to-com" href="#comment-block">评论 17</a>--}}
        </div>
        <div class="article-body mt-4 f-17 editormd-html-preview" style="line-height:1.8">
            {!! html_entity_decode($data->content) !!}
        </div>

        <!-- 版权注明 -->
        <div class="ml-3">
            <p class="font-weight-bold text-info">
                <i class="fa fa-bullhorn mx-1"></i>
                {!! htmlspecialchars_decode($config['COPYRIGHT_WORD']) !!}
            </p>
        </div>

        <!-- 标签云 -->
        <div class="tag-cloud my-4">
            @foreach($data->labels as $v)
                <a class="tags f-14" href="{{ url('tag', [$v->id]) }}">{{ $v->name }}</a>
            @endforeach
        </div>

        <!-- 上下翻页 -->
        <nav class="more-page f-15">
            <ul class="pagination justify-content-between">
                <li class="page-item">
                    @if(!is_null($prev))
                    <a class="d-none d-md-block" href="{{ url('article', [$prev->id]) }}" title="{{ $prev->title }}">
                        <i class="fa fa-chevron-left mr-1"></i>
                        {{ $prev->title }}
                    </a>
                    <a class="d-md-none" href="{{ url('article', [$prev->id]) }}">
                        <i class="fa fa-chevron-left mr-1"></i>上一篇
                    </a>
                    @endif
                </li>
                <li class="page-item">
                    @if(!is_null($next))
                    <a class="d-none d-md-block" href="{{ url('article', [$next->id]) }}" title="{{ $next->title }}">
                        {{ $next->title }}
                        <i class="fa fa-chevron-right ml-1"></i>
                    </a>
                    <a class="d-md-none" href="{{ url('article', [$next->id]) }}">
                        下一篇<i class="fa fa-chevron-right ml-1"></i>
                    </a>
                    @endif
                </li>
            </ul>
        </nav>
    </div>
</div>

<!-- 相关评论 -->
{{--<div class="card mt-2 rounded-0 border-0" id="comment-block">--}}
    {{--<div class="card border-0 rounded-0 f-16" id="editor-block">            --}}
        {{--<div class="card-body text-center m-2 m-md-3 f-16" id="no-editor">--}}
            {{--<div>您尚未登录，请--}}
                {{--<a class="text-danger" href="/accounts/login/?next=/article/django-mysql/">登录</a> 或--}}
                {{--<a class="text-danger" href="/accounts/signup/?next=/article/django-mysql/">注册</a> 后评论--}}
            {{--</div>--}}
            {{--<div class="login-link mt-2">--}}
                {{--<a class="mx-3" href="/accounts/weibo/login/?next=/article/django-mysql/" title="社交账号登录有点慢，请耐心等候！"><i class="fa fa-weibo fa-2x"></i></a>--}}
                {{--<a class="mx-3" href="/accounts/github/login/?next=/article/django-mysql/" title="社交账号登录有点慢，请耐心等候！"><i class="fa fa-github fa-2x"></i></a>--}}
            {{--</div>--}}
        {{--</div>            --}}
    {{--</div>--}}
    {{--<div class="card-body p-2 p-md-3 f-17" id="comment-list">--}}
        {{--<ul class="list-unstyled">--}}
            {{--<div class="mb-3">--}}
                {{--<strong>0&nbsp;人参与&nbsp;|&nbsp;0&nbsp;条评论</strong>--}}
            {{--</div>                --}}
            {{--暂时没有评论，欢迎来尬聊！               --}}
        {{--</ul>--}}
    {{--</div>--}}
{{--</div>--}}
@stop