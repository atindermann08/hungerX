<?php

class Category extends \Eloquent {
	protected $fillable = [];

	public static $rules = [
		'name' => 'required|min:2|unique:categories'
	];

	public function foods(){
	  return $this->hasMany('Food');
  }
}
