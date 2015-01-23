<?php

class OrderItem extends \Eloquent {
	protected $fillable = [];
    
    public function order(){
        return $this->belongsTo('Order');
    }
    
     public function foods(){
        return $this->hasMany('Food');
    }
}