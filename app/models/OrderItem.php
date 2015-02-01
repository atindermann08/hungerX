<?php

class OrderItem extends \Eloquent {
	protected $fillable = ['order_id', 'food_id', 'name', 'price', 'quantity'];

    public function order(){
        return $this->belongsTo('Order');
    }

     public function foods(){
        return $this->hasMany('Food');
    }
}
