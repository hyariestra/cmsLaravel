<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	

	protected $fillable = [

		'post_id',
		'author',
		'photo',
		'email',
		'body',
		'is_active'

	];

	public function replies()
	{
		return $this->hasMany('App\CommentReply');
	}

	public function post()
	{
		return $this->belongsTo('App\Post');
	}

	public function getGravatarAttribute()
	{

		$hash = md5( strtolower( trim($this->attributes['email'] ) ) );

		return "http://www.gravatar.com/avatar/$hash";
	}

}
