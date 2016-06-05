@extends('backend.layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-8">
			@if(isset($post) && is_object($post))
		    <form method="post" action="{{$moduleUrl}}/{{$post->id}}">
		    <input type="hidden" name="_method" value="PUT">
		    @else
		    <form method="post" action="{{$moduleUrl}}">
		    @endif
		   		{!!csrf_field()!!}
		        <div class="form-group">
		        	<label class="form-label">Title</label>
		        	<input class="form-control" type="text" name="title" value="@if(isset($post) && is_object($post)) {{$post->title}} @endif">
		        </div>
		        <div class="form-group">
		        	<label class="form-label">Cover Image</label>
		        	<input class="form-control" type="file" name="coverimage">
		        </div>
		        <div class="form-group">
		        	<label class="form-label">Content</label>
		        	<textarea class="form-control" rows="7" name="content">@if(isset($post) && is_object($post)) {{$post->content}} @endif</textarea>
		        </div>
		        <button class="btn btn-primary" type="submit" name="save">Save</button>
		    </form>
		</div>
		<div class="col-xs-12 col-md-4">
			<h4>Categories</h4>
			<ul>
				<li>--</li>
			</ul>
		</div>
	</div>
</div>
@endsection
