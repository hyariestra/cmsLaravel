@extends('layouts.admin')

@section('content')

<h2>{{$title}}</h2>
<hr>

{!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store']) !!}
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
	{!! Form::label('status','Status:') !!}
	{!! Form::select('status', array(1=>'Active', 0=>'Not Active'),null ,['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('password','Password:') !!}
	{!! Form::password('password',['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
@stop