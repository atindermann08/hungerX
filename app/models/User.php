<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;

use Zizaco\Entrust\HasRole;


class User extends Eloquent implements ConfideUserInterface
{
    use HasRole, ConfideUser;
    
    public function order(){
        return $this->hasMany('Order');
    }
    public function address(){
        return $this->hasMany('Address');
    }
}
