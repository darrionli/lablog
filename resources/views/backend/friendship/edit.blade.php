@extends('layouts.backend.frame')

@section('title', '编辑友情管理')

@section('one-level', '友情管理管理')

@section('two-level', '编辑友情管理')

@section('content')
    <div class="box-body">
        <div class="col-md-6 col-md-offset-3">
            <form action="{{ route('back.friend.update', [$friend->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>名称</label>
                    <input type="text" class="form-control" name="name" value="{{ $friend->name }}">
                </div>
                <div class="form-group">
                    <label>URL</label>
                    <input type="text" class="form-control" name="url" value="{{ $friend->url }}">
                </div>
                <div class="form-group">
                    <label>排序</label>
                    <input type="text" class="form-control" name="sort" value="{{ $friend->sort }}">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="提交">
                </div>
            </form>
        </div>

    </div>
    <!-- /.box-body -->
@stop
