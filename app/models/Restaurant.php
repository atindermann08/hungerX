<?php

class Restaurant extends \Eloquent {
	protected $fillable = [];
    
    public function foods(){
        return $this->belongsToMany('Food')->withPivot('price');
    }
    
    public function areas(){
        return $this->belongsToMany('Area');
    }
	
	public function area(){
        return $this->belongsTo('Area');
    }
    
    public function orders(){
        return $this->hasMany('Order');
    }
	
    public function address(){
        return $this->belongsTo('Address');
    }
}