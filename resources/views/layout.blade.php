<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Asset Management System</title>

    <!-- Bootstrap CSS -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/libs.css" rel="stylesheet">

    @yield('metadata')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
    <header class="main-header">
        <nav class="navbar navbar-static-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="{{ Auth::check() ? '/home' : '/' }}">Asset Management</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    @can('manage_employees')
                        <li><a href="/employees">Employees</a></li>
                    @endcan
                    @can('manage_departments')
                        <li><a href="/departments">Departments</a></li>
                    @endcan
                    @can('manage_assets')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Assets <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/assets">Assets</a></li>
                            @can('manage_categories')
                                <li><a href="/categories">Categories</a></li>
                            @endcan
                            @can('manage_vendors')
                                <li><a href="/vendors">Vendors</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @can('manage_users')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Users <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/users">Users</a></li>
                            @can('manage_roles')
                                <li><a href="/roles">Roles</a></li>
                            @endcan
                            @can('manage_permissions')
                                <li><a href="/permissions">Permissions</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs">Welcome! {{ Auth::user()->name }} <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="user-header">
                        <img src="{{ Auth::user()->gravatar }}" class="img-circle" alt="{{ Auth::user()->name }}" />
                        <p>
                          {{ Auth::user()->name }} - {{ Auth::user()->email }}
                          <small>Member since {{ Auth::user()->created_at->format('M, Y') }}</small>
                        </p>
                      </li>
                      <!-- Menu Footer-->
                      <li class="user-footer">
                        <!-- <div class="pull-left">
                          <a href="#" class="btn btn-default btn-flat">Profile</a>
                        </div> -->
                        <div class="pull-right">
                          <a href="/auth/logout">Sign out</a>
                        </div>
                      </li>
                    </ul>
                  </li>
                
                @else
                    <li><a href="/auth/login">Login</a></li>
                @endif
                </ul>
            </div><!-- /.navbar-collapse -->

            </div>
        </nav>
    </header>
    <div class="content-wrapper">
        <div class="container">
            @yield('content')
        </div>
    </div>
    <footer class="main-footer">
        <div class="container">
          <strong>Copyright &copy; {{ date('Y') }} <a href="#">Asset management</a>.</strong> All rights reserved.
        </div>
      </footer>
</div>
<!-- Javascripts -->
<script src="/js/libs.js"></script>
@yield('scripts.footer')
@include('flash')
</body>
</html>