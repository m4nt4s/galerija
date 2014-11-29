<?php

class Photo extends \Eloquent {

	protected $fillable = ['title', 'img', 'category_id'];

	public function category()
	{
		return $this->belongsTo('Category');
	}

	public function comments()
	{
		return $this->morphMany('Comment', 'commentable');
	}

}