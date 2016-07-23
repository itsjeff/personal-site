@extends('frontend.layouts.master')

@section('content')

    <div class="content">
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
                    <li><a href="https://github.com/itsjeff" title="Jeffery Nielsen @ Github" target="_blank">itsjeff@Github</a></li>
                </ul>
            </div>

            <div class="panel-block">
                <div class="panel-block-heading">
                    Categories
                </div>
                <ul class="panel-block-body">
                    @foreach($categories as $category)
                        <li><a href="/categories/{{$category->slug}}" title="{{$category->title}}">{{$category->title}} ({{count($category->posts)}})</a></li>
                    @endforeach
                </ul>
            </div>
        </div>


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

            {{$posts->render()}}
        @else
            <i>No posts yet</i>
        @endif
    </div>
    
@endsection
      
