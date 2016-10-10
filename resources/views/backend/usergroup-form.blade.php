@extends('backend.layouts.app')

@section('content')
	<div class="container">
    	@if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    	@endif
		@if(isset($userGroup))
		<form method="post" action="{{$moduleUrl}}/{{$userGroup->id}}">
			<input type="hidden" name="_method" value="PUT">
			{{csrf_field()}}
		@else
		<form method="post" action="{{$moduleUrl}}">
			{{csrf_field()}}
		@endif

			<div class="form-group">
				<div class="row">
					<label class="col-xs-12 col-md-3 form-control-label">Name</label>
					<div class="col-xs-12 col-md-9">
						<input class="form-control" type="text" name="name" value="@if(isset($userGroup)){{$userGroup->name}}@endif">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="col-xs-12 col-md-3 form-control-label">Tag</label>
					<div class="col-xs-12 col-md-9">
						<input class="form-control" type="text" name="tag" value="@if(isset($userGroup)){{$userGroup->tag}}@endif">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-9 col-md-offset-3">
					<button class="btn btn-primary" type="submit" name="save">Save</button>
				</div>
			</div>
		</form>
	</div>
@endsection
