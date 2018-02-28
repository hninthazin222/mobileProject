<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('dashboard')  }}">My App</a>
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
                <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                    <a href="{{ route('sale') }}"><i class="fa fa-share-alt fa-fw"></i> Sale</a>
                </li>

                <li {{ (Request::is('*charts') ? 'class="active"' : '') }}>
                    <a href="{{ route('register') }}"><i class="fa fa-user-plus"></i> New Employee</a>
                    <!-- /.nav-second-level -->
                </li>
                <li {{ (Request::is('*tables') ? 'class="active"' : '') }}>
                    <a href="{{ route('employees') }}"><i class="fa fa-users"></i> Employees</a>
                </li>
                <li {{ (Request::is('*forms') ? 'class="active"' : '') }}>
                    <a href="{{ route('category') }}"><i class="fa fa-list"></i> Categories</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i> Product<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                            <a href="{{ route('newProduct') }}"><i class="fa fa-plus-circle"></i> New Item</a>
                        </li>
                        <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                            <a href="{{ route('product') }}"><i class="fa fa-google-wallet"></i> Items</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li {{ (Request::is('*forms') ? 'class="active"' : '') }}>
                    <a href="{{ route('report') }}"><i class="fa fa-bar-chart"></i> Report</a>
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