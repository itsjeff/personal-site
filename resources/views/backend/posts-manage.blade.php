@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="form-group">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <a class="btn btn-primary" href="{{$moduleUrl}}/create">Create</a>
            </div>
            <div class="col-xs-12 col-md-6 text-xs-right">
                <a href="{$moduleUrl}}?status=active">Active</a> ({{$activeRows}}) - 
                <a href="{$moduleUrl}}?status=trashed">Trashed</a> ({{$trashedRows}})
            </div>
        </div>
    </div>

    <table class="table">
    <thead>
        <tr>
            <td width="30%">Title</td>
            <td width="30%">Categories</td>
            <td>Created at</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach ($posts as $post)
        <tr>
            <td width="30%"><a href="{{$moduleUrl}}/{{$post->id}}/edit">{{$post->title}}</a></td>
            <td width="30%">
                @foreach($post->categories as $category)
                    {{$category->title}}
                @endforeach
            </td>
            <td>{{date('d M, Y - g:i a' ,strtotime($post->created_at))}}</td>
            <td>
                <a href="{{$moduleUrl}}/{{$post->id}}/edit">Edit</a> / 
                <a href="{{$moduleUrl}}/{{$post->id}}/delete">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>
</div>
@endsection
