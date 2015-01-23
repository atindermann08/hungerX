<?php

class Area extends \Eloquent {
	protected $fillable = [];
    protected $hidden = ['created_at','updated_at','city_id'];
    
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