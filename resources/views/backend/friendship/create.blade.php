@extends('layouts.backend.frame')

@section('title', '添加友情链接')

@section('one-level', '友情链接管理')

@section('two-level', '添加友情标签')

@section('content')
    <div class="box-body">
        <div class="col-md-6 col-md-offset-3">
            <form action="{{ route('back.friend.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>名称</label>
                    <input type="text" class="form-control" name="name" value="">
                </div>
                <div class="form-group">
                    <label>URL</label>
                    <input type="text" class="form-control" name="url" value="">
                </div>
                <div class="form-group">
                    <label>排序</label>
                    <input type="text" class="form-control" name="sort" value="1">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="提交">
                </div>
            </form>
        </div>

    </div>
    <!-- /.box-body -->
@stop
