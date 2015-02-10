<?php

class Food extends \Eloquent {
		protected $fillable = [];

		public static $rules = [
			'name' => 'required|min:2|unique:foods',
			'category_id' => 'required|integer',
			'veg' => 'boolean'
		];

    public function category(){
        return $this->belongsTo('Category');
    }

    public function restaurants(){
        return $this->belongsToMany('Restaurant')->withPivot('price');
    }

    public function orders(){
        return $this->belongsTo('OrderItem');
    }
}
