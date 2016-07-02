@extends('backend.layouts.app')

@section('content')
	<div class="container">
		<h1>Users</h1>

	    <div class="form-group">
	    	<a class="btn btn-primary" href="{{$moduleUrl}}/create">Create</a>
	    </div>

	    <table class="table">
	    <thead>
	        <tr>
	            <td>#</td>
	            <td>Name</td>
	            <td>Email</td>
	            <td>Created at</td>
	            <td>Actions</td>
	        </tr>
	    </thead>
	    <tbody>
	        @foreach ($users as $user)
	            <tr>
	                <td>{{$user->id}}</td>
	                <td><a href="{{$moduleUrl}}/{{$user->id}}/edit">{{$user->name}}</a></td>
	                <td>{{$user->email}}</td>
	                <td>{{date('d M, Y - g:i a' ,strtotime($user->created_at))}}</td>
	                <td><a href="{{$moduleUrl}}/{{$user->id}}/edit">Edit</a></td>
	            </tr>
	        @endforeach
	    </tbody>
	    </table>
	</div>
@endsection