<?php

class Restaurant extends \Eloquent {
		protected $fillable = [];


		public static $rules = [
			'name' => 'required|min:2|unique:restaurants',
			'description' => 'required|min:20',
			'image' => 'required|image|mimes:jpeg,jpg,png,bmp,gif',
			'area_id' => 'required|integer',
			'min_order' => 'required|numeric',
			'delivery_fee' => 'required|numeric',
			'delivery_time' => 'required|numeric',
			'order_start_time' => 'required|regex:/^[0-2]?[0-9]:[0-9]{2}$/',
			'order_stop_time' => 'required|regex:/^[0-2]?[0-9]:[0-9]{2}$/',
			'online_payment' => 'boolean',
			'cash_on_delivery' => 'boolean',
			'preorder' => 'boolean',
			'pickup' => 'boolean',
			'pure_veg' => 'boolean'
		];

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
