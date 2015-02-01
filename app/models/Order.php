<?php

class Order extends \Eloquent {
	protected $fillable = ['user_id', 'restaurant_id', 'address_id', 'pickup', 'delivery_later', 'delivery_date', 'delivery_time', 'payment_status', 'payment_type', 'delivery_status'];

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
