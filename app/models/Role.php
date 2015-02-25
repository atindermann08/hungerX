<?php

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
  public static $rules = [
    'name' => 'required|min:3|unique:roles|regex:/^[a-zA-Z_]*$/'
  ];

}
