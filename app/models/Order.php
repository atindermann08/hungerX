<?php

class Order extends \Eloquent {
	protected $fillable = [];
    
    public function user(){
        return $this->belongsTo('User');
    }
    
    public function restaurant(){
        return $this->belongsTo('Restaurant');
    }
    
    public function address(){
        return $this->belongsTo('Address');
    } 
    
    public function items(){
        return $this->hasMany('OrderItem');
    }
}