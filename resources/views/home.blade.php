<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta name="viewport" content="width=device-width">

    <title>Jeffery Nielsen</title>
    <meta name="description" content="Jeffery Nielsen is a Fullstack Web Developer from Sydney, Australia.">

    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
    <div class="container">
        <div class="welcome">
            <h1>Jeffery Nielsen</h1>
            <p>Feeling: <strong>fine and dandy</strong></p>

            <ul>
                <li><a href="https://github.com/itsjeff">itsjeff@Github</a></li>
            </ul>
        </div>
        <div class="content">
            @if (count($posts) > 0)
                @foreach ($posts as $post)
                    <h3><a href="/{{$post->slug}}" title="Read {{$post->title}}">{{$post->title}}</a></h3>
                    <div>{!!$post->created_at!!}</div>
                    {!!$post->content!!}
                @endforeach
            @else
                <i>No posts yet</i>
            @endif
        </div>
    </div>
</body>
</html>
      
