@extends('backend.layouts.app')

@section('content')
<div class="container">
	<div class="row">
		@if(isset($post) && is_object($post))
	    <form method="post" action="{{$moduleUrl}}/{{$post->id}}" enctype="multipart/form-data">
	    <input type="hidden" name="_method" value="PUT">
	    @else
	    <form method="post" action="{{$moduleUrl}}" enctype="multipart/form-data">
	    @endif
			<div class="col-xs-12 col-md-8">
		   		{!!csrf_field()!!}
		        <div class="form-group">
		        	<label class="form-label">Title</label>
		        	<input class="form-control" type="text" name="title" value="@if(isset($post) && is_object($post)){{$post->title}}@endif">
		        </div>
		        <div class="form-group">
		        	<label class="form-label">Content</label>
		        	<textarea id="summernote" rows="7" name="content">@if(isset($post) && is_object($post)){{$post->content}}@endif</textarea>
		        </div>
		        <button class="btn btn-primary" type="submit" name="save">Save</button>
			</div>
			<div class="col-xs-12 col-md-4">
				<div class="form-group">
					<h5>Publish as</h5>
					<select class="form-control" name="type">
						<option value="post">Post</option>
						<option value="draft">Draft</option>
					</select>
				</div>

		        <div class="form-group">
		        	<label class="form-label">Cover Image</label>
		        	<input class="form-control" type="file" name="coverimage">
		        </div>

				<h5>Categories</h5>
				<div class="list-group">
				@foreach($categories as $category)
					<label class="list-group-item" for="category_{{$category->id}}">
						<input type="checkbox" name="category[]" id="category_{{$category->id}}" value="{{$category->id}}" @if (in_array($category->id, $categoryRelationships))checked="checked"@endif>
						{{$category->title}}
					</label>
				@endforeach
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
