<?php

class Restaurant extends \Eloquent {
		protected $fillable = [];


		public static $rules = [
			'name' => 'required|min:2|unique:restaurants',
			'description' => 'required|min:20',
			'area_id' => 'required|integer',
			'pure_veg' => 'required|boolean',
			'min_order' => 'required|number',
			'delivery_fee' => 'required|number',
			'delivery_time' => 'required|number',
			'online_payment' => 'required|boolean',
			'cash_on_delivery' => 'required|boolean',
			'preorder' => 'required|boolean',
			'pickup' => 'required|boolean',
			'order_start_time' => 'required|date',
			'order_stop_time' => 'required|date'
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
