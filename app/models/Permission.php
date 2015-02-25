<?php

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
  public static $rules = [
    'name' => 'required|min:3|unique:permissions|regex:/^[a-zA-Z_]*$/',
    'display_name' => 'required|unique:permissions'
  ];


}
