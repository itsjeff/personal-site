@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="form-group">
        <a class="btn btn-primary" href="{{$moduleUrl}}/create">Create</a>
    </div>

	<form method="post">
	{{csrf_field()}}
	<input type="text" name="im" placeholder="What is your name?">
	<button type="submit" name="submit">Send</button>
	</form>

    <table class="table">
    <thead>
        <tr>
            <td width="30%">Title</td>
            <td width="30%">Slug</td>
            <td width="30%">Post count</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach ($categories as $category)
        <tr>
            <td width="30%"><a href="{{$moduleUrl}}/{{$category->id}}/edit">{{$category->title}}</a></td>
            <td width="30%">{{$category->slug}}</td>
            <td width="30%">{{count($category->postsRelations)}}</td>
            <td><a href="{{$moduleUrl}}/{{$category->id}}/edit">Edit</a></td>
        </tr>
    @endforeach
    </tbody>
    </table>
</div>
@endsection
