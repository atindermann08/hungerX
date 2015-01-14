<?php

class State extends \Eloquent {
	protected $fillable = [];
    protected $hidden = ['created_at','updated_at'];
    
    public function cities(){
        return $this->hasMany('City');
    }
    
    public function country(){
        return $this->belongsTo('Country');
    }
}