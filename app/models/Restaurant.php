<?php

class Restaurant extends \Eloquent {
	protected $fillable = [];
    
    public function foods(){
        return $this->belongsToMany('Food')->withPivot('price');
    }
    
    public function areas(){
        return $this->belongsToMany('Area');
    }
}