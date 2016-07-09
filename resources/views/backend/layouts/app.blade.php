<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Backend</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link rel="stylesheet" href="/assets/icons/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/backend/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/backend/css/main.css">
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
                            <a class="dropdown-item" href="#">Edit profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Logout</a>
                        </div>
                    </div>
                </div>
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
                    <li class="nav-item"><a href="{{ url('/admin/posts') }}">Posts</a></li>
                    <li class="nav-item"><a href="{{ url('/admin/categories') }}">Categories</a></li>
                    <li class="nav-item"><a href="{{ url('/admin/media') }}">Media</a></li>
                    <li class="nav-item"><a href="{{ url('/admin/users') }}">Users</a></li>
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
