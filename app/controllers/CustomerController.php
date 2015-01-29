<?php

class CustomerController extends \BaseController {

    public function profile()
	{
        $user = Confide::user();
        return View::make('customer.profile',compact($user));		
	}

    public function addresses($id)
	{
        $user = User::with('addresses')->find($id);
        return View::make('customer.addresses',compact($user));
		
	}

    public function orders($id)
	{
        $user = User::with('orders')->find($id);
        return View::make('customer.orders',compact($user));
		
	}
    
    public function changePassword($id)
	{
        return View::make('customer.change_password');
	}

}