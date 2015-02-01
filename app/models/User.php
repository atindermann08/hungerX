<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;

use Zizaco\Entrust\HasRole;


class User extends Eloquent implements ConfideUserInterface
{
    use HasRole, ConfideUser;
    
    
    public function orders(){
        return $this->hasMany('Order');
    }
    
    public function addresses(){
        return $this->hasMany('Address');
    }
    	
    public function defaultAddress(){
        return $this->belongsTo('Address', 'address_id', 'id');
    }
	
	public static function setDefaultAddress($user_id, $address_id){
		$user = User::find( $user_id );
		$user->address_id = $address_id;
		$user->save();
	}
}
