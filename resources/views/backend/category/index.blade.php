@extends('layouts.backend.frame')

@section('title', '分类列表')

@section('one-level', '分类管理')

@section('two-level', '分类列表')

@section('content')
    <div class="box-body">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>排序</th>
                <th>分类名</th>
                <th>描述</th>
                <th>状态</th>
                <th>发布日期</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @if($category)
                @foreach($category as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->sort }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->describe }}</td>
                        <td>
                            @if(is_null($value->deleted_at))
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            @else
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            @endif
                        </td>
                        <td>{{ $value->created_at }}</td>
                        <td>
                            @if($value->trashed())
                                <a href="javascript:if(confirm('确认恢复该分类吗？')) window.location.href='{{ route('back.cate.restore', [$value->id]) }}'" class="btn btn-success btn-sm">恢复</a>
                            @else
                                <a href="{{ route('back.cate.edit', [$value->id]) }}" class="btn btn-primary btn-sm">编辑</a>
                                <a href="javascript:if(confirm('确认删除该分类吗？')) window.location.href='{{ route('back.cate.destroy', [$value->id]) }}'" class="btn btn-warning btn-sm">删除</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
@stop
