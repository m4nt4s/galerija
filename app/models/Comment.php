<?php

class Comment extends \Eloquent {

	protected $fillable = ['text', 'commentable_id', 'commentable_type', 'user_id'];

	public function commentable()
	{
		return $this->morphTo();
	}

	public function user()
	{
		return $this->belongsTo('User');
	}

}