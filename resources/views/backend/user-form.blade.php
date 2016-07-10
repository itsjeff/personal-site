@extends('backend.layouts.app')

@section('content')
	<div class="container">
	@if(isset($user))
		<form method="post" action="{{$moduleUrl}}/{{$user->id}}">
			<input type="hidden" name="_method" value="PUT">
			{{csrf_field()}}
	@else
		<form method="post" action="{{$moduleUrl}}">
			{{csrf_field()}}
	@endif

			<h4 class="form-group">Personal details</h4>
			<div class="form-group">
				<div class="row">
					<label class="col-xs-12 col-md-3 form-control-label">Name</label>
					<div class="col-xs-12 col-md-9">
						<input class="form-control" type="text" name="name" value="@if(isset($user)){{$user->name}}@endif">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="col-xs-12 col-md-3 form-control-label">Email</label>
					<div class="col-xs-12 col-md-9">
						<input class="form-control" type="text" name="email" value="@if(isset($user)){{$user->email}}@endif">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="col-xs-12 col-md-3 form-control-label">User group</label>
					<div class="col-xs-12 col-md-9">
						<select class="form-control" name="role">
							<option value="1">Admin</option>
						</select>
					</div>
				</div>
			</div>

			<h4 class="form-group">
				@if(isset($user))
					Change Password
				@else
					Password
				@endif
			</h4>
			<div class="form-group">
				<div class="row">
					<label class="col-xs-12 col-md-3 form-control-label">Password</label>
					<div class="col-xs-12 col-md-9">
						<input class="form-control" type="password" name="password" value="">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="col-xs-12 col-md-3 form-control-label">Confirm Password</label>
					<div class="col-xs-12 col-md-9">
						<input class="form-control" type="password" name="confirm_password" value="">
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