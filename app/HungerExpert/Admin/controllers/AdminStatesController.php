<?php

namespace HungerExpert\Admin\controllers;

class AdminStatesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$states = \State::with('country')->get();
		$countries = \Country::all()->lists('name','id');
		return \View::make('admin.localization.states')
						->with('states', $states)
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
		$validator = \Validator::make(\Input::all(), \State::$rules);

		if($validator->passes())
		{
			$state = new \State;
			$state->name = \Input::get('name');
			$state->country_id = \Input::get('country_id');
			$state->save();
			return \Redirect::back()->with('message','State added.');
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
		$country = \State::find($id);
		if($country)
		{
			$country->delete();
			return \Redirect::back()
						->with('message', 'State deleted.');
		}
		return \Redirect::back()
						->with('message', 'State does not exist.');
	}


}
