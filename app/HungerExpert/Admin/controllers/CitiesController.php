<?php

namespace HungerExpert\Admin\controllers;

class CitiesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cities = \City::with('state')->get();
		$states = \State::all()->lists('name','id');
		$countries = \Country::all()->lists('name','id');
		return \View::make('admin.localization.cities')
						->with('states', $states)
						->with('cities', $cities)
						->with('countries', $countries);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = \Validator::make(\Input::all(), \City::$rules);

		if($validator->passes())
		{
			$city = new \City;
			$city->name = \Input::get('name');
			$city->state_id = \Input::get('state_id');
			$city->save();
			return \Redirect::back()->with('message','City added.');
		}

		return \Redirect::back()
					->with('message','There were some errors. Please try again later..')
					->withInput()
					->withErrors($validator);

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$city = \City::find($id);
		if($city)
		{
			$city->delete();
			return \Redirect::back()
						->with('message', 'City deleted.');
		}
		return \Redirect::back()
						->with('message', 'City does not exist.');
	}


}
