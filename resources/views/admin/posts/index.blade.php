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
			<td><a href="{{route('admin.posts.edit',$record->id)}}" >{{$record->user->name}}</a> </td>
			<td>{{$record->category?$record->category->name:'Uncategorized'}}</td>
			<td><img width="50px" src="{{$record->photo ? $record->photo->file:'http://placehold.it/400x400'}}" alt=""></td>
			<td>{{$record->title}}</td>
			<td>{{str_limit($record->body,10)}}</td>
			<td>{{$record->created_at->diffForHumans()}}</td>
			<td>{{$record->updated_at->diffForHumans()}}</td>
		</tr>
		<?php $i++;?>
		@endforeach

		@endif
	</tbody>
</table>

@stop