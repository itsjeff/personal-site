@extends('backend.layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			@if(isset($category) && is_object($category))
		    <form method="post" action="{{$moduleUrl}}/{{$category->id}}">
		    <input type="hidden" name="_method" value="PUT">
		    @else
		    <form method="post" action="{{$moduleUrl}}">
		    @endif
		   		{!!csrf_field()!!}
		        <div class="form-group">
		        	<label class="form-label">Title</label>
		        	<input class="form-control" type="text" name="title" value="@if(isset($category) && is_object($category)){{$category->title}}@endif">
		        </div>
		        <div class="form-group">
		        	<label class="form-label">Slug</label>
		        	<input class="form-control" type="text" name="title" value="@if(isset($category) && is_object($category)){{$category->slug}}@endif">
		        </div>
		        <div class="form-group">
		        	<label class="form-label">Parent category</label>
		        	<select class="form-control" name="parent_id">
		        	@foreach($categories as $category)
		        		<option value="{{$category->id}}">{{$category->title}}</option>
		        	@endforeach
		        	</select>
		        </div>
		        <div class="form-group">
		        	<label class="form-label">Content</label>
		        	<textarea class="form-control" rows="7" name="content"></textarea>
		        </div>
		        <button class="btn btn-primary" type="submit" name="save">Save</button>
		    </form>
		</div>
	</div>
</div>
@endsection
