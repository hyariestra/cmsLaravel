@extends('layouts.admin')


@section('content')


@if (count($comments)>0)
	
<h1>Comments</h1>

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Id</th>
			<th>Author</th>
			<th>Email</th>
			<th>Body</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $i = 1; ?>
		@foreach ($comments as $comment)
			das
		<tr>
			<td>{{$i}}</td>
			<td>{{$comment->author}}</td>
			<td>{{$comment->email}}</td>
			<td>{{$comment->body}}</td>
			<!-- seko route /post/{id} -->
			<td><a href="{{route('home.post',$comment->post->id)}}">View Post</a></td>
			<td>
				
				@if ($comment->is_active == 1)
					
					{!! Form::model(['method'=>'PATCH','action'=>['PostCommentController@update',$comment->id]]) !!}

					<input type="hidden" name="is_active" value="0" >


					<div class="form-group">
						{!! Form::submit('Un-approve', ['class'=>'btn btn-success']) !!}
					</div>

					{!! Form::close() !!}

					@else

					{!! Form::model(['method'=>'PATCH','action'=>['PostCommentController@update',$comment->id]]) !!}

					<input type="hidden" name="is_active" value="1" >


					<div class="form-group">
						{!! Form::submit('Approve', ['class'=>'btn btn-primary']) !!}
					</div>

					{!! Form::close() !!}

				@endif

			</td>
			<td>
					{!! Form::model(['method'=>'DELETE','action'=>['PostCommentController@destroy',$comment->id]]) !!}

				
					<div class="form-group">
						{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
					</div>

					{!! Form::close() !!}
			</td>
		</tr>
		<?php $i++; ?>
		@endforeach
	</tbody>
</table>

@else

<h1>No Comments</h1>


@endif

@stop
