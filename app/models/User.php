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
}
