<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url ('/admin') }}">{{ config('app.name', 'Laravel') }}</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">

        <!-- /.dropdown -->
        <li class="dropdown">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>{{Auth::User()->name}} <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>
                    <a href="{{route('user_profile')}}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{route('logout')}}">
                        <i class="fa fa-sign-out fa-fw"></i> Logout
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                    <a href="{{ route('dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li {{ (Request::is('*charts') ? 'class="active"' : '') }}>
                    <a href="{{ route('register') }}"><i class="fa fa-user-plus"></i> New Employee</a>
                    <!-- /.nav-second-level -->
                </li>
                <li {{ (Request::is('*tables') ? 'class="active"' : '') }}>
                    <a href="{{ url ('tables') }}"><i class="fa fa-table fa-fw"></i> Tables</a>
                </li>
                <li {{ (Request::is('*forms') ? 'class="active"' : '') }}>
                    <a href="{{ url ('forms') }}"><i class="fa fa-edit fa-fw"></i> Forms</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                            <a href="{{ url ('panels') }}">Panels and Collapsibles</a>
                        </li>
                        <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                            <a href="{{ url ('buttons' ) }}">Buttons</a>
                        </li>
                        <li {{ (Request::is('*notifications') ? 'class="active"' : '') }}>
                            <a href="{{ url('notifications') }}">Alerts</a>
                        </li>
                        <li {{ (Request::is('*typography') ? 'class="active"' : '') }}>
                            <a href="{{ url ('typography') }}">Typography</a>
                        </li>
                        <li {{ (Request::is('*icons') ? 'class="active"' : '') }}>
                            <a href="{{ url ('icons') }}"> Icons</a>
                        </li>
                        <li {{ (Request::is('*grid') ? 'class="active"' : '') }}>
                            <a href="{{ url ('grid') }}">Grid</a>
                        </li>
                        <li {{ (Request::is('*progressbars') ? 'class="active"' : '') }}>
                            <a href="{{ url ('progressbars') }}">Progressbars</a>
                        </li>
                        <li {{ (Request::is('*collapse') ? 'class="active"' : '') }}>
                            <a href="{{ url ('collapse') }}">Collapse</a>
                        </li>
                        <li {{ (Request::is('*stats') ? 'class="active"' : '') }}>
                            <a href="{{ url ('stats') }}">Stats</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Second Level Item</a>
                        </li>
                        <li>
                            <a href="#">Second Level Item</a>
                        </li>
                        <li>
                            <a href="#">Third Level <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                            </ul>
                            <!-- /.nav-third-level -->
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li {{ (Request::is('*blank') ? 'class="active"' : '') }}>
                            <a href="{{ url ('blank') }}">Blank Page</a>
                        </li>
                        <li>
                            <a href="{{ url ('login') }}">Login Page</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li {{ (Request::is('*documentation') ? 'class="active"' : '') }}>
                    <a href="{{ url ('documentation') }}"><i class="fa fa-file-word-o fa-fw"></i> Documentation</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>