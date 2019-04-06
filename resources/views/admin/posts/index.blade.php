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
			<th>No</th>
			<th>User</th>
			<th>Category</th>
			<th>Photo</th>
			<th>Title</th>
			<th>Body</th>
			<th>Created</th>
			<th>Updated</th>
		</tr>
	</thead>
	<tbody>
		@if ($posts)
		<?php $i=1; ?>
		@foreach ($posts as $record)
		<tr>
			<td>{{$i}}</td>
			{{-- show photo use mutator --}}
			<td>{{$record->user_id}}</td>
			<td>{{$record->category_id}}</td>
			<td>{{$record->photo_id}}</td>
			<td>{{$record->title}}</td>
			<td>{{$record->body}}</td>
			<td>{{$record->created_at->diffForHumans()}}</td>
			<td>{{$record->updated_at->diffForHumans()}}</td>
		</tr>
		<?php $i++;?>
		@endforeach

		@endif
	</tbody>
</table>

@stop