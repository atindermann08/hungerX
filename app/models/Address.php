<?php

class Address extends \Eloquent {
	protected $fillable = [];
    
    public function user(){
        return $this->belongsTo('User');
    }
    
    public function order(){
        return $this->hasMany('Order');
    }
    
    public function area(){
        return $this->belongsTo('Area');
    }
}