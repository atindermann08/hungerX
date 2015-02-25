<?php

namespace HungerExpert\Admin\controllers;

class AdminController extends \BaseController{

	public function dashboard()
	{
		return \View::make('admin.dashboard');
	}

	public function food()
	{
		return \View::make('admin.food');
	}

	public function restaurant()
	{
		return \View::make('admin.restaurant');
	}

	public function order()
	{
		return \View::make('admin.order');
	}
}
