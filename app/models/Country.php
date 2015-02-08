<?php

class Country extends \Eloquent {
		protected $fillable = [];
    protected $hidden = ['created_at','updated_at'];

		public static $rules = [
			'name' => 'required|unique:countries'
		];

    public function states(){
        return $this->hasMany('State');
    }
}
