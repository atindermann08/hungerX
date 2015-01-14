<?php

class City extends \Eloquent {
	protected $fillable = [];
    protected $hidden = ['created_at','updated_at','state_id'];
    
    public function areas(){
        return $this->hasMany('Area');
    }
    
    public function state(){
        return $this->belongsTo('State');
    }
}