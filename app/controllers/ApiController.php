<?php

class ApiController extends \BaseController {

	/**
	 * Returns Cities along with areas in json format.
	 *
	 * @return Response
	 */
	public function locations()
	{
    $cities = City::with('areas')->get();
		return Response::json($cities);
	}

	public function restaurantsByArea($idArea)
	{
    $restaurants = Area::with('restaurants')->find($idArea);
		return Response::json($restaurants);
	}

	public function restaurant($id)
	{
    $restaurant = Restaurant::with('foods')->find($id);
		return Response::json($restaurant);
	}

}
