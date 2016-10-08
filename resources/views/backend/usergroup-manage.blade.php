@extends('backend.layouts.app')

@section('content')
	<div class="container">
	    <div class="form-group">
	    	<a class="btn btn-primary" href="{{$moduleUrl}}/create">Create</a>
	    </div>

	    <table class="table">
	    <thead>
	        <tr>
	            <th width="20%">Name</th>
	            <th width="66%">Tag</th>
	            <th width="14%" class="text-xs-center">Actions</th>
	        </tr>
	    </thead>
	    <tbody>
	        @foreach ($userGroups as $userGroup)
	            <tr>
	                <td width="20%"><a href="{{$moduleUrl}}/{{$userGroup->id}}/edit">{{$userGroup->name}}</a></td>
	                <td width="66%">{{$userGroup->tag}}</td>
	                <td width="14%" class="text-xs-center">
	                	<a href="{{$moduleUrl}}/{{$userGroup->id}}/edit">Edit</a> / 
	                	<a href="{{$moduleUrl}}/{{$userGroup->id}}/edit">Delete</a>
	                </td>
	            </tr>
	        @endforeach
	    </tbody>
	    </table>
	</div>
@endsection