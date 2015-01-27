<?php

class Food extends \Eloquent {
	protected $fillable = [];
    
    public function categories(){
        return $this->belongsTo('Category');
    }
    
    public function restaurants(){
        return $this->belongsToMany('Restaurant')->withPivot('price');
    }
    
    public function orders(){
        return $this->belongsTo('OrderItem');
    }
}