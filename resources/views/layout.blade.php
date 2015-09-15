<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Asset Management System</title>

    <!-- Bootstrap CSS -->
    <link href="/css/libs.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    
    @yield('metadata')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Asset Management</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <!-- <ul class="nav navbar-nav">
                    <li><a href="/flyers">Flyers</a></li>
                </ul> -->
            
            <ul class="nav navbar-nav navbar-right">
            @if (Auth::check())
            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="/departments">Departments</a></li>
                    <li><a href="/users">Users</a></li>
                    <li><a href="/roles">Roles</a></li>
                    <li><a href="/permissions">Permissions</a></li>
                    <li><a href="/auth/logout">Logout</a></li>
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
<div class="container">
    @yield('content')
</div>

<!-- Javascripts -->
<script src="/js/libs.js"></script>
@yield('scripts.footer')
@include('flash')
</body>
</html>