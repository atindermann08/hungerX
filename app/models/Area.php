<?php

class Area extends \Eloquent {
	protected $fillable = [];
    protected $hidden = ['created_at','updated_at','city_id'];

		public static $rules = [
			'name' => 'required|min:2|unique:areas',
			'city_id' => 'required|integer'
		];

    public function city(){
        return $this->belongsTo('City');
    }

    public function restaurants(){
        return $this->belongsToMany('Restaurant');
    }

     public function address(){
        return $this->hasMany('Area');
    }
}
