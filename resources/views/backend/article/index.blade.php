@extends('layouts.backend.frame')

@section('title', '文章列表')

@section('one-level', '文章管理')

@section('two-level', '文章列表')

@section('content')

@section('load_js')
<script>

    // 删除
    function softdelete(obj)
    {
        if(confirm('确认删除该文章吗？')){
            window.location.href = '/backend/'
        }
    }
</script>
@stop
<div class="box-body">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>标题</th>
                <th>分类</th>
                <th>是否置顶</th>
                <th>访问量</th>
                <th>状态</th>
                <th>发布日期</th>
                <th>修改日期</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @if($article)
                @foreach($article as $value)
                    <tr>
                        <td>{{ $value->title }}</td>
                        <td>{{ $value->category->name }}</td>
                        <td>{{ $value->is_top==0 ? '否' : '是' }}</td>
                        <td>{{ $value->readed }}</td>
                        <td>
                            @if(is_null($value->deleted_at))
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            @else
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            @endif
                        </td>
                        <td>{{ $value->created_at }}</td>
                        <td>{{ $value->updated_at }}</td>
                        <td>
                            <a href="{{ route('back.art.edit', [$value->id]) }}" class="btn btn-primary btn-sm">编辑</a>
                            @if($value->trashed())
                                <a href="javascript:if(confirm('确认恢复该文章吗？')) window.location.href='{{ route('back.art.restore', [$value->id]) }}'" class="btn btn-success btn-sm">恢复</a>
                            @else
                                <a href="javascript:if(confirm('确认删除该文章吗？')) window.location.href='{{ route('back.art.destroy', [$value->id]) }}'" class="btn btn-warning btn-sm">删除</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div class="col-md-8 col-md-offset-2" style="text-align: center;">
        {{ $article->links() }}
    </div>
</div>
<!-- /.box-body -->
@stop
