<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Backend</title>
    <link rel="stylesheet" href="/assets/icons/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/backend/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/backend/css/main.css">

    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-80901255-1', 'auto');
    ga('send', 'pageview');
    </script>
</head>
<body id="app-layout">
    <nav class="navbar">
        <div class="container">
            <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
                <div class="pull-xs-right">
                    <div class="dropdown">
                        <button class="auth-user dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Auth::user()->name}}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="/admin/users/{{Auth::user()->id}}/edit">Edit profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout">Logout</a>
                        </div>
                    </div>
                </div>
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
                    <li class="nav-item"><a href="{{ url('/admin/posts') }}">Posts</a></li>
                    <li class="nav-item"><a href="{{ url('/admin/categories') }}">Categories</a></li>
                    <li class="nav-item"><a href="{{ url('/admin/media') }}">Media</a></li>
                    <li class="nav-item"><a href="{{ url('/admin/users') }}">Users</a></li>
                    <li class="nav-item"><a href="{{ url('/admin/groups') }}">Groups</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @if(isset($breadcrumbs))
    <?php
    $countCrumb = 0;
    ?>
    <div class="breadcrumbs">
        <div class="container">
            <ul>
            @foreach($breadcrumbs as $breadcrumb)
                <li><span>
                    @if(empty($breadcrumb['url']))
                        @if($countCrumb > 0)<i class="fa fa-angle-right"></i>@endif{{$breadcrumb['name']}}
                    @else
                        @if($countCrumb > 0)<i class="fa fa-angle-right"></i>@endif<a href="{{$breadcrumb['url']}}">{{$breadcrumb['name']}}</a>
                    @endif
                </span></li>
                <?php $countCrumb++; ?>
            @endforeach
            </ul>
        </div>
    </div>
    @endif

    <div class="content">
        @yield('content')
    </div>

    <!-- JavaScripts -->
    <script src="/assets/scripts/jquery-2.2.4.min.js"></script>
    <script src="/assets/backend/js/bootstrap.min.js"></script>
</body>
</html>
