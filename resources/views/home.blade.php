<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta name="viewport" content="width=device-width">

    <title>Mr.Jeffery Nielsen</title>
</head>
<body>
    <h1>Jeffery Nielsen</h1>
    <p>Feeling: <strong>fine and dandy</strong></p>

    @foreach ($posts as $post)
        <h3><a href="/{{$post->slug}}" title="Read {{$post->title}}">{{$post->title}}</a></h3>
        <div>{!!$post->created_at!!}</div>
        {!!$post->content!!}
    @endforeach
</body>
</html>
      
