<?php

class Category extends \Eloquent {

	protected $fillable = ['name'];

	public function photos()
	{
		return $this->hasMany('Photo');
	}

}