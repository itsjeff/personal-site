<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta name="viewport" content="width=device-width">

    <title>Jeffery Nielsen</title>
    <meta name="description" content="Jeffery Nielsen is a Fullstack Web Developer from Sydney, Australia.">

    <link rel="stylesheet" href="/assets/css/main.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class="container">
        <div class="welcome">
            <div class="branding">
                <h1>Jeffery Nielsen</h1>
                <span>Web Developer from NSW, Australia</span>
            </div>

            <div class="feeling">
                Feeling fine and dandy
            </div>

            <div class="panel-block">
                <div class="panel-block-heading">
                    Other Places
                </div>
                <ul class="panel-block-body">
                    <li><a href="https://github.com/itsjeff">itsjeff@Github</a></li>
                </ul>
            </div>

            <div class="panel-block">
                <div class="panel-block-heading">
                    Categories
                </div>
                <ul class="panel-block-body">
                    <li><a href="/category/posts" title="Posts">Posts ({{$total_posts}})</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            @if (count($posts) > 0)
                @foreach ($posts as $post)
                    <article class="post" id="post-{{$post->id}}_{{$post->slug}}">
                        <div class="post-title">
                            <div class="created-at">{{date('d M, Y - g:i a' ,strtotime($post->created_at))}}</div>
                            <h3><a href="/{{$post->slug}}" title="Read {{$post->title}}">{{$post->title}}</a></h3>
                        </div>
                        @if($post->cover_image > 0)
                            <div class="post-coverimage">
                                <img src="{{$post->coverimage->path}}" style="width: 100%; max-width: 100%;">
                            </div>
                        @endif
                        <div class="post-content">
                            {!!$post->content!!}
                        </div>
                    </article>
                @endforeach
            @else
                <i>No posts yet</i>
            @endif
        </div>
    </div>
</body>
</html>
      
