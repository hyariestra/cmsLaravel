@extends('layouts.admin')


@section('content')


@if (count($replies)>0)
	
<h1>Replies</h1>

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
		@foreach ($replies as $reply)
		<tr>
			<td>{{$i}}</td>
			<td>{{$reply->author}}</td>
			<td>{{$reply->email}}</td>
			<td>{{$reply->body}}</td>
			<!-- seko route /post/{id} -->
			<td><a href="{{route('home.post',$reply->comment->post->id)}}">View Post</a></td>
			<td>
				
				@if ($reply->is_active == 1)
					
					{!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}

					<input type="hidden" name="is_active" value="0" >


					<div class="form-group">
						{!! Form::submit('Un-approve', ['class'=>'btn btn-success']) !!}
					</div>

					{!! Form::close() !!}

					@else

					{!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}

					<input type="hidden" name="is_active" value="1" >

					<div class="form-group"> 
						{!! Form::submit('Approve', ['class'=>'btn btn-primary']) !!}
					</div>

					{!! Form::close() !!}

				@endif

			</td>
			<td>
					{!! Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$reply->id]]) !!}

				
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

<h1>No Replies</h1>


@endif

@stop
