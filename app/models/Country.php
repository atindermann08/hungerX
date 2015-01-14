<?php

class Country extends \Eloquent {
	protected $fillable = [];
    protected $hidden = ['created_at','updated_at'];
    
    public function states(){
        return $this->hasMany('State');
    }
}