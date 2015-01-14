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
    
}
