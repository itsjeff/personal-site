@extends('backend.layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-8">
		    <form method="post" action="{{$moduleUrl}}">
		        {!!csrf_field()!!}
		        <div class="form-group">
		        	<label class="form-label">Title</label>
		        	<input class="form-control" type="text" name="title" value="{{@if(isset($post) && is_object($post)) Hi {{@endif}}">
		        </div>
		        <div class="form-group">
		        	<label class="form-label">Cover Image</label>
		        	<input class="form-control" type="file" name="coverimage">
		        </div>
		        <div class="form-group">
		        	<label class="form-label">Content</label>
		        	<textarea class="form-control" rows="7" name="content"></textarea>
		        </div>
		        <button class="btn btn-primary" type="submit" name="save">Save</button>
		    </form>
		</div>
		<div class="col-xs-4">
			<h4>Categories</h4>
			<ul>
				<li>--</li>
			</ul>
		</div>
	</div>
</div>
@endsection
