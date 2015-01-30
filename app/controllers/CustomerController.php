<?php

class CustomerController extends \BaseController {

    public function profile()
	{
        //$user = Confide::user();
        return View::make('customer.profile');		
	}

    public function addresses()
	{
        //$user = User::with('addresses')->find($id);
        return View::make('customer.addresses');
		
	}

    public function orders()
	{
        //$user = User::with('orders')->find($id);
        return View::make('customer.orders');
		
	}
    
    public function changePassword()
	{
        return View::make('customer.change_password');
	}

}