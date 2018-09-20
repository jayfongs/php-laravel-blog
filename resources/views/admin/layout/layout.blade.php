<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    {{--<link rel="stylesheet" href="{{ asset('assets/bower/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bower/Font-Awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/layer/skin/layer.css') }}">
    @yield('cssFile')
    <script src="{{ asset('assets/bower/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bower/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/layer/layer.js') }}"></script>
    @yield('jsFile')--}}
    <link rel="stylesheet" href="{{ elixir('admin/css/all-common.css') }}">
    <script src="{{ elixir('admin/js/all-common.js') }}"></script>
    <script src="{{ asset('build/layer/layer.js') }}"></script>
    <title>JayFong's - @yield('title')</title>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <a href="{{ route('admin::home') }}" class="logo">
                <span class="logo-mini"><b>Jay</b></span>
                <span class="logo-lg"><b>Jay Fong</b></span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"></a>
                <div class="navbar-custom-menu">
                    {{--<ul class="nav navbar-nav">
                        <li>
                            <a href="{{ route('password') }}">修改密码</a>
                        </li>
                        <li><a href="{{ route('logout') }}">退出</a></li>
                    </ul>--}}
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar" style="height: auto;">
                <ul class="sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <i class="fa icon-book"></i>
                            <span>文章管理</span>
                            <i class="icon-angle-left fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li {!! request()->route()->getName() == 'article::index' ? 'class="active"' : '' !!}>
                                <a href="{{ route('article::index')}}">文章列表</a>
                            </li>
                            <li {!! request()->route()->getName() == 'article::create' ? 'class="active"' : '' !!}>
                                <a href="{{ route('article::create') }}">新建文章</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="fa icon-tags"></i>
                            <span>tag管理</span>
                            <i class="icon-angle-left fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li {!! request()->route()->getName() == 'tag::index' ? 'class="active"' : '' !!}>
                                <a href="{{ route('tag::index')}}">tag列表</a>
                            </li>
                            <li {!! request()->route()->getName() == 'tag::create' ? 'class="active"' : '' !!}>
                                <a href="{{ route('tag::create') }}">新建tag</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="fa icon-link"></i>
                            <span>友情链接</span>
                            <i class="icon-angle-left fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li {!! request()->route()->getName() == 'links::index' ? 'class="active"' : '' !!}>
                                <a href="{{ route('links::index')}}">友情链接列表</a>
                            </li>
                            <li {!! request()->route()->getName() == 'links::create' ? 'class="active"' : '' !!}>
                                <a href="{{ route('links::create') }}">新建友情链接</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </section>
        </aside>
        <div class="content-wrapper">
            @yield('content')
        </div>
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 0.0.1-1
            </div>
            <strong>Copyright © 2016 </strong>
        </footer>
    </div>
</body>
</html>
<script>
    $(function () {
       $('ul.treeview-menu > li.active').parents('li').addClass('active');
    });
</script>