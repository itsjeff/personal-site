@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="form-group">
        <a class="btn btn-primary" href="{{$moduleUrl}}/create">Create</a>
    </div>

    <table class="table">
    <thead>
        <tr>
            <th width="30%">Title</th>
            <th width="30%">Slug</th>
            <th width="30%">Post count</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($categories as $category)
        <tr>
            <td width="30%"><a href="{{$moduleUrl}}/{{$category->id}}/edit">{{$category->title}}</a></td>
            <td width="30%">{{$category->slug}}</td>
            <td width="30%">{{count($category->posts)}}</td>
            <td><a href="{{$moduleUrl}}/{{$category->id}}/edit">Edit</a></td>
        </tr>
    @endforeach
    </tbody>
    </table>
</div>
@endsection
