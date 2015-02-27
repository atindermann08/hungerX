<?php

namespace HungerExpert\Admin\controllers;

class AdminController extends \BaseController{

	public function dashboard()
	{
		return \View::make('admin.dashboard')
					->with('users',\DB::table('users')->count())
					->with('restaurants',\DB::table('restaurants')->count())
					->with('orders',\DB::table('orders')->count())
					->with('cities',\DB::table('cities')->count());
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
	public function profile()
	{
		return \View::make('admin.profile')
				->with('user', \Confide::user());
	}
}
