@extends('layouts.backend.frame')

@section('title', '配置项')

@section('one-level', '网站管理')

@section('two-level', '配置项')

@section('content')
    <div class="box-body">
        <div class="col-md-6 col-md-offset-3">
            <form action="{{ route('back.label.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>标签名</label>
                    <input type="text" class="form-control" name="name" value="">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="提交">
                </div>
            </form>
        </div>

    </div>
    <!-- /.box-body -->
@stop
