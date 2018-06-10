@extends('layouts.backend.frame')

@section('title', '友情链接列表')

@section('one-level', '友情链接管理')

@section('two-level', '友情链接列表')

@section('content')
    <div class="box-body">
        <div class="form-group">
            <a href="{{ route('back.friend.create') }}" class="btn btn-primary btn-sm">新增</a>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>名称</th>
                <th>URL</th>
                <th>发布日期</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @if($friend)
                @foreach($friend as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->url }}</td>
                        <td>{{ $value->created_at }}</td>
                        <td>
                            @if($value->trashed())
                                <a href="javascript:if(confirm('确认恢复该条数据吗？')) window.location.href='{{ route('back.friend.restore', [$value->id]) }}'" class="btn btn-success btn-sm">恢复</a>
                            @else
                                <a href="{{ route('back.friend.edit', [$value->id]) }}" class="btn btn-primary btn-sm">编辑</a>
                                <a href="javascript:if(confirm('确认删除该条数据吗？')) window.location.href='{{ route('back.friend.destroy', [$value->id]) }}'" class="btn btn-warning btn-sm">删除</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@stop
