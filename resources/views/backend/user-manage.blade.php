@extends('backend.layouts.app')

@section('content')
	<div class="container">
	    <div class="form-group">
	    	<a class="btn btn-primary" href="{{$moduleUrl}}/create">Create</a>
	    </div>

	    <table class="table">
	    <thead>
	        <tr>
	            <th>#</th>
	            <th>Name</th>
	            <th>Email</th>
	            <th>Created at</th>
	            <th>Actions</th>
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