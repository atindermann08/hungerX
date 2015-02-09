<?php

namespace HungerExpert\Admin\controllers;

class AreasController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$areas = \Area::with('city')->get();
		$cities = \City::all()->lists('name','id');
		return \View::make('admin.localization.area')
						->with('areas', $areas)
						->with('cities', $cities);
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
		$validator = \Validator::make(\Input::all(), \Area::$rules);

		if($validator->passes())
		{
			$area = new \Area;
			$area->name = \Input::get('name');
			$area->city_id = \Input::get('city_id');
			$area->save();
			return \Redirect::back()->with('message','Area added.');
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
		$area = \Area::find($id);
		if($area)
		{
			$area->delete();
			return \Redirect::back()
						->with('message', 'Area deleted.');
		}
		return \Redirect::back()
						->with('message', 'Area does not exist.');
	}


}
