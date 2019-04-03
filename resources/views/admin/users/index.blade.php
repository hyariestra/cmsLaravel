@extends('layouts.admin')


@section('content')

<h2>{{$title}}</h2>
<hr>

@if (Session::has('deleted_user'))

<div class="alert alert-danger" role="alert">
	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	{{session('deleted_user')}}
</div>

@endif


<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Id</th>
			<th>Photo</th>
			<th>Name</th>
			<th>Email</th>
			<th>Role</th>
			<th>Active</th>
			<th>Created</th>
			<th>Updated</th>
		</tr>
	</thead>
	<tbody>
		@if ($user)
		<?php $i=1; ?>
		@foreach ($user as $record)
		<tr>
			<td>{{$i}}</td>
			{{-- show photo use mutator --}}
			<td><img height="70" src="{{$record->photo?$record->photo->file:'no user photo'}}" alt=""></td>
			<td><a href="{{route('admin.users.edit',$record->id)}}">{{$record->name}}</a></td>
			<td>{{$record->email}}</td>
			<td>{{$record->role->name}}</td>
			<td>{{$record->is_active==1?'Active':'Not Active'}}</td>
			<td>{{$record->created_at->diffForHumans()}}</td>
			<td>{{$record->updated_at->diffForHumans()}}</td>
		</tr>
		<?php $i++;?>
		@endforeach

		@endif
	</tbody>
</table>

@stop