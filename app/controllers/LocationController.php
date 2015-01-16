<?php

class LocationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function locationSelect()
	{
		return View::make('location.select');
	}


}
