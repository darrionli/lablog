@extends('layouts.backend.frame')

@section('title', '编辑标签')

@section('one-level', '标签管理')

@section('two-level', '编辑标签')

@section('content')
    <div class="box-body">
        <div class="col-md-6 col-md-offset-3">
            <form action="{{ route('back.label.update', [$label->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>标签名</label>
                    <input type="text" class="form-control" name="name" value="{{ $label->name }}">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="提交">
                </div>
            </form>
        </div>

    </div>
    <!-- /.box-body -->
@stop
