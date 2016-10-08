<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta name="viewport" content="width=device-width">

    <title>{{($title) ? $title.' | ' : ''}}Jeffery Nielsen</title>
    <meta name="description" content="Jeffery Nielsen is a Fullstack Web Developer from Sydney, Australia.">

    <link rel="stylesheet" href="/assets/frontend/css/main.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-80901255-1', 'auto');
    ga('send', 'pageview');
    </script>
</head>
<body>
    <div class="nav">
        <div class="container">
            <div class="me">
                <a href="https://github.com/itsjeff" title="View my projects @ Github" target="_blank">GitHub</a>
            </div>
            <div class="branding">
                <h1><a href="/" title="Home">Jeffery Nielsen</a></h1>
                <span>Web Developer from Sydney, Australia</span>
            </div>
        </div>
    </div>

    @yield('content')
</body>
</html>
      
