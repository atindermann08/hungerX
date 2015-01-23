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
		return View::make('location.select',array('cities' => $cities,'areas' => $areas, 'selectedCity' => null));
	}
	public function locationSelectArea()
	{
        $selectedCity = Input::get('city');
		$cities = City::all()->lists('name', 'id');
		$areas = City::find(Input::get('city'))->areas()->lists('name', 'id');
		return View::make('location.select',array('cities' => $cities,'areas' => $areas, 'selectedCity' => $selectedCity));
	}

}
