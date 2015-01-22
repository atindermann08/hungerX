<?php

class RestaurantController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /restaurant
	 *
	 * @return Response
	 */
	public function index()
	{
		$id = Input::get('area');
		$restaurants = Restaurant::all();
		$area = Area::find($id);
		$city = $area->city;
		return View::make('restaurant.index',['restaurants' => $restaurants, 'area' => $area, 'city' => $city]);

	}

	/**
	 * Display the specified resource.
	 * GET /restaurant/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		$id = Input::get('area');
		$restaurant = Restaurant::find($id);
		return View::make('restaurant.show',['restaurants' => $restaurants]);

	}


}
