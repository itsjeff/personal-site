<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Backend</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link rel="stylesheet" href="/assets/backend/css/bootstrap.min.css">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-light bg-faded">
        <div class="container">
            <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
                <ul class="nav navbar-nav">
                <li class="nav-item"><a href="{{ url('/admin') }}">Home</a></li>
                <li class="nav-item"><a href="{{ url('/admin/posts') }}">Posts</a></li>
                <li class="nav-item"><a href="{{ url('/admin/categories') }}">Categories</a></li>
                <li class="nav-item"><a href="{{ url('/admin/media') }}">Media</a></li>
                <li class="nav-item"><a href="{{ url('/admin/users') }}">Users</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="/assets/backend/js/bootstrap.min.js"></script>
</body>
</html>
