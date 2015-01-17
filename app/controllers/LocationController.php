<?php

class LocationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function locationSelectCity()
	{
		$cities = City::all()->lists('name', 'id');
		$areas = array('');
		//dd($cities);
		return View::make('location.select',array('cities' => $cities,'areas' => $areas));
	}
	public function locationSelectArea($idCity)
	{

		$cities = City::all()->lists('name', 'id');
		$areas = City::find($idCity)->areas()->lists('name', 'id');
		dd($areas);
		return View::make('location.select',array('cities' => $cities,'areas' => $areas));
	}

}
