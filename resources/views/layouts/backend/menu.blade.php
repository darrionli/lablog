<ul class="sidebar-menu" data-widget="tree">
    <li class="header">主菜单</li>
    <li class="treeview">
        <a href="javascript:void(0);">
            <i class="glyphicon glyphicon-book"></i> <span>文章管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('back.art.index') }}"><i class="fa fa-circle-o"></i> 文章列表</a></li>
            <li><a href="{{ route('back.art.create') }}"><i class="fa fa-circle-o"></i> 添加文章</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="glyphicon glyphicon-folder-open"></i> <span>分类管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('back.cate.index') }}"><i class="fa fa-circle-o"></i>分类列表</a></li>
            <li><a href="{{ route('back.cate.create') }}"><i class="fa fa-circle-o"></i>添加分类</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="glyphicon glyphicon-tags"></i> <span>标签管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('back.label.index') }}"><i class="fa fa-circle-o"></i>标签列表</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="glyphicon glyphicon-pencil"></i> <span>评论管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="javascript:void(0);"><i class="fa fa-circle-o"></i>评论列表</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="glyphicon glyphicon-cog"></i> <span>网站管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('back.config.index') }}"><i class="fa fa-circle-o"></i> 配置项</a></li>
        </ul>
    </li>
</ul>
