@extends('frontend.layouts.master')

@section('content')

    <div class="container">
        <div class="heading"> 
            <h1>{{$category->title}}</h1>
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
                            <img src="/{{$post->coverimage->path}}" style="width: 100%; max-width: 100%;">
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
