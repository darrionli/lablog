@extends('layouts.backend.frame')

@section('title', '配置项')

@section('one-level', '网站管理')

@section('two-level', '配置项')

@section('load_css')
<link rel="stylesheet" href="/bootcss/plugins/iCheck/all.css">
<style>
    table th {text-align: right;}
</style>
@stop

@section('load_js')
<script src="/bootcss/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function(){
        $('input[type="radio"]').iCheck({
            radioClass   : 'iradio_minimal-blue'
        })
    })
</script>
@stop

@section('content')
    <div class="box-body">
        <div class="col-md-6 col-md-offset-3">
            <form action="{{ route('back.config.store') }}" method="post">
                {{ csrf_field() }}
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 25%;vertical-align: middle;">网站状态</th>
                        <td>
                            <input type="radio" name="WEB_STATUS" value="1" @if($config['WEB_STATUS']==1) checked="checked" @endif> 开启
                            &nbsp;&nbsp;
                            <input type="radio" name="WEB_STATUS" value="0" @if($config['WEB_STATUS']==0) checked="checked" @endif> 关闭
                        </td>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">网站关闭提示文字</th>
                        <td>
                            <textarea class="form-control" name="WEB_CLOSE_WORD" id="WEB_CLOSE_WORD" cols="30" rows="3">{{ $config['WEB_CLOSE_WORD'] }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">备案号</th>
                        <td>
                            <input class="form-control" type="text" name="WEB_ICP_NUMBER" value="{{ $config['WEB_ICP_NUMBER'] }}">
                        </td>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">站长邮箱</th>
                        <td><input type="text" class="form-control" name="ADMIN_EMAIL" value="{{ $config['ADMIN_EMAIL'] }}"></td>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">网站名称</th>
                        <td><input type="text" class="form-control" name="WEB_NAME" value="{{ $config['WEB_NAME'] }}"></td>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">网站标题</th>
                        <td><input type="text" class="form-control" name="WEB_TITLE" value="{{ $config['WEB_TITLE'] }}"></td>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">网站关键字</th>
                        <td>
                            <textarea class="form-control" name="WEB_KEYWORDS" id="WEB_KEYWORDS" cols="30" rows="3">{{ $config['WEB_KEYWORDS'] }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">网站描述</th>
                        <td>
                            <textarea class="form-control" name="WEB_DESCRIPTION" id="WEB_DESCRIPTION" cols="30" rows="3">{{ $config['WEB_DESCRIPTION'] }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">默认作者</th>
                        <td><input type="text" class="form-control" name="AUTHOR" value="{{ $config['AUTHOR'] }}"></td>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">文章保留版权提示</th>
                        <td>
                            <textarea class="form-control" name="COPYRIGHT_WORD" id="COPYRIGHT_WORD" cols="30" rows="3">{{ $config['COPYRIGHT_WORD'] }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">文章图片title和alt内容</th>
                        <td>
                            <input class="form-control" type="text" name="IMAGE_TITLE_ALT_WORD" value="{{ $config['IMAGE_TITLE_ALT_WORD'] }}" >
                        </td>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">文字水印内容</th>
                        <td>
                            <input class="form-control" type="text" name="TEXT_WATER_WORD" value="{{ $config['TEXT_WATER_WORD'] }}" >
                        </td>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">文字水印文字颜色</th>
                        <td>
                            <input class="form-control" type="text" name="TEXT_WATER_COLOR" value="{{ $config['TEXT_WATER_COLOR'] }}" >
                        </td>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">QQ登录APP ID</th>
                        <td>
                            <input class="form-control" type="text" name="QQ_APP_ID" value="{{ $config['QQ_APP_ID'] }}" >
                        </td>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">QQ登录APP KEY</th>
                        <td>
                            <input class="form-control" type="text" name="QQ_APP_KEY" value="{{ $config['QQ_APP_KEY'] }}" >
                        </td>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">新浪微博登录API KEY</th>
                        <td>
                            <input class="form-control" type="text" name="SINA_API_KEY" value="{{ $config['SINA_API_KEY'] }}" >
                        </td>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">新浪微博登录SECRET</th>
                        <td>
                            <input class="form-control" type="text" name="SINA_SECRET" value="{{ $config['SINA_SECRET'] }}" >
                        </td>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">Github Client ID</th>
                        <td>
                            <input class="form-control" type="text" name="GITHUB_CLIENT_ID" value="{{ $config['GITHUB_CLIENT_ID'] }}" >
                        </td>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">Github Client Secret</th>
                        <td>
                            <input class="form-control" type="text" name="GITHUB_CLIENT_SECRET" value="{{ $config['GITHUB_CLIENT_SECRET'] }}" >
                        </td>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">百度推送site提交链接</th>
                        <td>
                            <input class="form-control" type="text" name="BAIDU_SITE_URL" value="{{ $config['BAIDU_SITE_URL'] }}" >
                        </td>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">第三方统计代码</th>
                        <td>
                            <textarea class="form-control" name="WEB_STATISTICS" cols="30" rows="3" placeholder="">{{ $config['WEB_STATISTICS'] }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">SMTP服务器</th>
                        <td>
                            <input class="form-control" type="text" name="EMAIL_SMTP" value="{{ $config['EMAIL_SMTP'] }}" >
                        </td>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">邮箱账号</th>
                        <td>
                            <input class="form-control" type="text" name="EMAIL_USERNAME" value="{{ $config['EMAIL_USERNAME'] }}" >
                        </td>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">邮箱密码</th>
                        <td>
                            <input class="form-control" type="password" name="EMAIL_PASSWORD" value="{{ $config['EMAIL_PASSWORD'] }}" >
                        </td>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">发件人名称</th>
                        <td>
                            <input class="form-control" type="text" name="EMAIL_FROM_NAME" value="{{ $config['EMAIL_FROM_NAME'] }}" >
                        </td>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">接收评论通知邮箱</th>
                        <td>
                            <input class="form-control" type="text" name="EMAIL_RECEIVE" value="{{ $config['EMAIL_RECEIVE'] }}" >
                        </td>
                    </tr>
                </table>
                <div class="form-group" style="text-align: center;">
                    <input class="btn btn-primary" type="submit" value="提交">
                </div>
            </form>
        </div>

    </div>
    <!-- /.box-body -->
@stop
