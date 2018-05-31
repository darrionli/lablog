@extends('layouts.backend.frame')

@section('title', '标签列表')

@section('one-level', '标签管理')

@section('two-level', '标签列表')

@section('content')
    <div class="box-body">
        <div class="form-group">
            <a href="{{ route('back.label.create') }}" class="btn btn-primary btn-sm">新增</a>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>分类名</th>
                <th>状态</th>
                <th>发布日期</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @if($label)
                @foreach($label as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
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
                                <a href="javascript:if(confirm('确认恢复该标签吗？')) window.location.href='{{ route('back.label.restore', [$value->id]) }}'" class="btn btn-success btn-sm">恢复</a>
                            @else
                                <a href="{{ route('back.label.edit', [$value->id]) }}" class="btn btn-primary btn-sm">编辑</a>
                                <a href="javascript:if(confirm('确认删除该标签吗？')) window.location.href='{{ route('back.label.destroy', [$value->id]) }}'" class="btn btn-warning btn-sm">删除</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@stop
