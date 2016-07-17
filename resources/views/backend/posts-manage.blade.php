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
            <th class="hidden-sm-down" width="30%">Categories</th>
            <th class="hidden-sm-down">Created at</th>
            <th class="hidden-sm-down text-xs-center">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($posts as $post)
        <tr>
            <td width="30%"><a href="{{$moduleUrl}}/{{$post->id}}/edit">{{$post->title}}</a></td>
            <td class="hidden-sm-down" width="30%">
                <?php $count = 0; ?>
                @foreach($post->categories as $category)
                <?php 
                echo ($count > 0) ? ', '.$category->title : $category->title;
                $count++; 
                ?>
                @endforeach
            </td>
            <td class="hidden-sm-down">{{date('d M, Y - g:i a' ,strtotime($post->created_at))}}</td>
            <td class="hidden-sm-down text-xs-center">
                <a href="{{$moduleUrl}}/{{$post->id}}/edit">Edit</a> / 
                <a href="{{$moduleUrl}}/{{$post->id}}" data-action="ajax-delete">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>
</div>
@endsection
