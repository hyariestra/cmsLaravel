@extends('layouts.admin')

@section('content')

<h2>Create Post</h2>
<hr>

{!! Form::open(['method'=>'POST','action'=>'AdminPostsController@store','files'=>true]) !!}
<div class="form-group">
	{!! Form::label('title','Title:') !!}
	{!! Form::text('title', null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('category_id','Category:') !!}
	{!! Form::select('category_id', array(''=>'options'),null,['class'=>'form-control']) !!}
</div>



<div class="form-group">
	{!! Form::label('photo_id','Photo:') !!}
	{!! Form::file('photo_id',null,['class'=>'form-control']) !!}
</div>


<div class="form-group">
	{!! Form::label('body','Description:') !!}
	{!! Form::textarea('textarea',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
</div>
{!! Form::close() !!}

@include('includes.form_error')

	


@stop