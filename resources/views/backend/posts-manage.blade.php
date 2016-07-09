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
            <th width="30%">Title</th>
            <th width="30%">Categories</th>
            <th>Created at</th>
            <th class="text-xs-center">Actions</th>
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
            <td class="text-xs-center">
                <a href="{{$moduleUrl}}/{{$post->id}}/edit">Edit</a> / 
                <a href="{{$moduleUrl}}/{{$post->id}}" data-action="ajax-delete">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>
</div>
@endsection
