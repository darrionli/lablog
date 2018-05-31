<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="/bootcss/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs">admin</span>
            </a>
            <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                    <img src="/bootcss/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                    <p>
                        Alexander Pierce - Web Developer
                        <small>Member since Nov. 2012</small>
                    </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                    <div class="row">
                        <div class="col-xs-4 text-center">
                            <a href="#">Followers</a>
                        </div>
                        <div class="col-xs-4 text-center">
                            <a href="#">Sales</a>
                        </div>
                        <div class="col-xs-4 text-center">
                            <a href="#">Friends</a>
                        </div>
                    </div>
                    <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat">个人中心</a>
                    </div>
                    <div class="pull-right">
                        <form action="{{ route('back.logout') }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                        </form>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</div>
