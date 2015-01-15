<?php

class Category extends \Eloquent {
	protected $fillable = [];
    
     public function foods(){
        return $this->hasMany('Food');
    }
}