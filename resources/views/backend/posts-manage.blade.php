@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="form-group">
    <a class="btn btn-primary" href="{{$moduleUrl}}/create">Create</a>
    </div>

    <table class="table">
    <thead>
        <tr>
            <td>#</td>
            <td>Title</td>
            <td>Created at</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td><a href="{{$moduleUrl}}/{{$post->id}}/edit">{{$post->title}}</a></td>
                <td>{{date('d M, Y - g:i a' ,strtotime($post->created_at))}}</td>
                <td><a href="{{$moduleUrl}}/{{$post->id}}/edit">Edit</a></td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection
