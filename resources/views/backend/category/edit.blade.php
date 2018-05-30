@extends('layouts.backend.frame')

@section('title', '修改分类')

@section('one-level', '分类管理')

@section('two-level', '修改分类')

@section('content')
    <div class="box-body">
        <div class="col-md-6 col-md-offset-3">
            <form action="{{ route('back.cate.update', [$category->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>分类名</label>
                    <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                </div>
                <div class="form-group">
                    <label>描述</label>
                    <input type="text" class="form-control" name="describe" value="{{ $category->describe }}">
                </div>
                <div class="form-group">
                    <label>排序</label>
                    <input type="text" class="form-control" name="sort" value="{{ $category->sort }}">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="提交">
                    <a href="{{ route('back.cate.index') }}" class="btn btn-info">返回列表</a>
                </div>
            </form>
        </div>

    </div>
    <!-- /.box-body -->
@stop
