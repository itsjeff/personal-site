<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Backend</title>

	<link rel="stylesheet" href="/assets/scripts/summernote/summernote.css">
    <link rel="stylesheet" href="/assets/icons/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/backend/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/backend/css/main.css">
</head>
<body id="app-layout">
    <nav class="navbar">
        <div class="container">
            <div id="exCollapsingNavbar2">
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
                    <li class="nav-item @if(!Request::segment(2)) active @endif">
                        <a href="{{url('/admin')}}">Dashboard</a>
                    </li>
                    <li class="nav-item @if(Request::segment(2) == 'posts') active @endif">
                        <a href="{{url('/admin/posts')}}">Posts</a>
                    </li>
                    <li class="nav-item @if(Request::segment(2) == 'categories') active @endif">
                        <a href="{{url('/admin/categories')}}">Categories</a>
                    </li>
                    <li class="nav-item @if(Request::segment(2) == 'media') active @endif">
                        <a href="{{url('/admin/media')}}">Media</a>
                    </li>
                    <li class="nav-item @if(Request::segment(2) == 'users') active @endif">
                        <a href="{{url('/admin/users')}}">Users</a>
                    </li>
                    <li class="nav-item @if(Request::segment(2) == 'groups') active @endif">
                        <a href="{{url('/admin/groups')}}">Groups</a>
                    </li>
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
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
    <script src="/assets/scripts/summernote/summernote.min.js"></script>

	<script>
	$(document).ready(function() {
		$('#summernote').summernote({
		height: 200,
		toolbar: [
			['style', ['bold', 'italic', 'underline', 'clear']],
			['font', ['strikethrough', 'superscript', 'subscript']],
			['fontsize', ['fontsize']],
			['para', ['ul', 'ol', 'paragraph']],
		]
		});
	});
	</script>
</body>
</html>
