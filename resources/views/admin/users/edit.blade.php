@extends('layouts.admin')

@section('content')

<h2>{{$title}}</h2>
<hr>

<div class="row">
	

	<div class="col-sm-3">

		<img class="img-responsive img-rounded" src="{{$user->photo?$user->photo->file:'http://placehold.it/400x400'}}" alt="">

	</div>

	<div class="col-sm-9">

		{!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}
		<div class="form-group">
			{!! Form::label('name','Name:') !!}
			{!! Form::text('name', null,['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('email','Email:') !!}
			{!! Form::text('email', null,['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('role_id','Roles:') !!}
			{!! Form::select('role_id', [''=>'Choose Option'] + $roles,null,['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('is_active','Status:') !!}
			{!! Form::select('is_active', array(1=>'Active', 0=>'Not Active'),null ,['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('photo_id','Photo:') !!}
			{!! Form::file('photo_id',null,['class'=>'form-control']) !!}
		</div>


		<div class="form-group">
			{!! Form::label('password','Password:') !!}
			{!! Form::password('password',['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
		</div>
		{!! Form::close() !!}


		{!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]]) !!}

		{!! Form::submit('Delete user', ['class'=>'btn btn-danger']) !!}

		{!! Form::close() !!}


	</div>

</div>

<div class="row">
@include('includes.form_error')
	
</div>

	


@stop