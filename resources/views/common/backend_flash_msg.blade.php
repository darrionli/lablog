@foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(session()->has($msg))
        <div id="flashShowMessage" class="col-md-5 col-md-offset-3" style="position: absolute;z-index: 100;top: 2px;">
            <div class="alert alert-{{ $msg }} alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> 提示信息!</h4>
                {{ session()->get($msg) }}
            </div>
        </div>
        <script>
            setTimeout(function(){
                $("#flashShowMessage").fadeOut(500).remove();
            }, 3000);
        </script>
    @endif
@endforeach