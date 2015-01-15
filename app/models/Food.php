<?php

class Food extends \Eloquent {
	protected $fillable = [];
    
    public function categories(){
        return $this->belongsTo('Category');
    }
    
    public function restaurant(){
        return $this->belongsToMany('Restaurant')->withPivot('price');
    }
}