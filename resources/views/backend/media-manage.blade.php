@extends('backend.layouts.app')

@section('content')
	<div class="container">
	    <div class="form-group">
	    	<a class="btn btn-primary" href="{{$moduleUrl}}/create">Create</a>
	    </div>

	    <table class="table">
	    <thead>
	        <tr>
	            <th>Name</th>
	            <th>Type</th>
	            <th>Created at</th>
	            <th class="text-xs-center">Actions</th>
	        </tr>
	    </thead>
	    <tbody>
        @foreach($mediaFiles as $media)
            <tr>
                <td><a href="/{{$media->path}}" target="_blank">{{$media->path}}</a></td>
                <td>{{$media->mime_type}}</td>
                <td>{{date('d M, Y - g:i a' ,strtotime($media->created_at))}}</td>
                <td class="text-xs-center">
                	<a href="{{$moduleUrl}}/{{$media->id}}/edit">Edit</a> / 
                	<a href="{{$moduleUrl}}/{{$media->id}}" data-action="ajax-delete">Delete</a>
                </td>
            </tr>
        @endforeach
	    </tbody>
	    </table>
	</div>
@endsection