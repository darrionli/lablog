@extends('layouts.backend.frame')

@section('title', '添加分类')

@section('one-level', '分类管理')

@section('two-level', '添加分类')

@section('content')
    <div class="box-body">
        <div class="col-md-6 col-md-offset-3">
            <form action="{{ route('back.cate.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>分类名</label>
                    <input type="text" class="form-control" name="name" value="">
                </div>
                <div class="form-group">
                    <label>描述</label>
                    <input type="text" class="form-control" name="describe" value="">
                </div>
                <div class="form-group">
                    <label>排序</label>
                    <input type="text" class="form-control" name="sort" value="0">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="提交">
                </div>
            </form>
        </div>

    </div>
    <!-- /.box-body -->
@stop
