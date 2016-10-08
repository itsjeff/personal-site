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
	            <th>Email</th>
	            <th>User group</th>
	            <th>Created at</th>
	            <th width="10%" class="text-xs-center">Actions</th>
	        </tr>
	    </thead>
	    <tbody>
	        @foreach ($users as $user)
	            <tr>
	                <td><a href="{{$moduleUrl}}/{{$user->id}}/edit">{{$user->name}}</a></td>
	                <td>{{$user->email}}</td>
	                <td>
	                	@foreach($user->groups as $group)
	                		{{$group->name}}
	                	@endforeach
	                </td>
	                <td>{{date('d M, Y - g:i a' ,strtotime($user->created_at))}}</td>
	                <td width="10%" class="text-xs-center">
	                	<a href="{{$moduleUrl}}/{{$user->id}}/edit">Edit</a> / 
	                	<a href="{{$moduleUrl}}/{{$user->id}}/edit">Delete</a>
	                </td>
	            </tr>
	        @endforeach
	    </tbody>
	    </table>
	</div>
@endsection