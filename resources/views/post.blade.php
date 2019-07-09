@extends('layouts.blog-post')



@section('content')

<!-- Blog Post -->

<!-- Title -->
<h1>{{$post->title}}</h1>

<!-- Author -->
<p class="lead">
	by <a href="#">{{$post->user->name}}</a>
</p>

<hr>

<!-- Date/Time -->
<p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>

<hr>

<!-- Preview Image -->
<img class="img-responsive" src="{{$post->photo?$post->photo->file:'http://placehold.it/900x300'}}" alt="">

<hr>

<!-- Post Content -->
<p>{{$post->body}}</p>

<hr>

@if(Session::has('comment_message'))


{{session('comment_message')}}

@endif
<!-- Blog Comments -->

<!-- Comments Form -->
@if(Auth::check())
<div class="well">
	<h4>Leave a Comment:</h4>
	
	{!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store']) !!}

	<input type="hidden" name="post_id" value="{{$post->id}}">

	<div class="form-group">
		{!! Form::label('body','Body:') !!}
		{!! Form::textarea('body', null,['class'=>'form-control','rows'=>3]) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Submit Comment', ['class'=>'btn btn-primary']) !!}
	</div>

	{!! Form::close() !!}


</div>

@endif

<hr>

@if (count($comments) > 0)

<!-- Posted Comments -->

<!-- Comment -->
@foreach ($comments as $comment)

<div class="media">
	<a class="pull-left" href="#">
		{{-- <img height="64" class="media-object" src="{{$comment->photo ? $comment->photo:'http://placehold.it/64x64'}}" alt=""> --}}
		<img height="64" class="media-object" src="{{$comment->gravatar}}" alt="">
	</a>
	<div class="media-body">
		<h4 class="media-heading">{{$comment->author}}
			<small>{{$comment->created_at->diffForHumans()}}</small>
		</h4>
		<p>{{$comment->body}}</p>


		@if (count($comment->replies) > 0)

		@foreach ($comment->replies as $reply)

		@if($reply->is_active == 1)
		{{-- nested comment --}} 

		
		<div class="nested-comment media">
			<a class="pull-left" href="#">
				<img height="64" class="media-object" src="{{$reply->photo ? $reply->photo:'http://placehold.it/64x64'}}" alt="">
			</a>
			<div class="media-body">
				<h4 class="media-heading">{{$reply->author}}
					<small>{{$reply->created_at->diffForHumans()}}</small>
				</h4>
				<p>{{$reply->body}}</p>
			</div>

			<div class="comment-reply-container">

				<button class="toggle-reply btn btn-primary pull-right" type="">Reply</button>

				<div class="comment-reply col-sm-6">
					
					{!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply']) !!}

					<input type="hidden" name="comment_id" value="{{$comment->id}}">

					<div class="form-group">
						{!! Form::label('body','Body:') !!}
						{!! Form::textarea('body',null,['class'=>'form-control','rows'=>'2']) !!}
					</div>

					<div class="form-group">
						{!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
					</div>
					{!! Form::close() !!}

				</div>

			</div>
			{{-- end nested comment --}}
		</div>

		@else

		<h1>no replies</h1>


		@endif
		@endforeach

		@endif

	</div>
</div>

@endforeach
@endif
@stop

@section('scripts')

<script>
	
	$(".comment-reply-container .toggle-reply").click(function(){


		$(this).next().slideToggle('slow');

	});

</script>

@stop