<?php

namespace HungerExpert\Admin\controllers;

class RestaurantsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return \View::make('admin.restaurants.index')
						->with('restaurants', \Restaurant::all());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return \View::make('admin.restaurants.create');
	}
	


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = \Validator::make(\Input::all(), \Restaurant::$rules);

		if($validator->passes())
		{
			$restaurant = new \Restaurant;
			$restaurant->name = \Input::get('name');
			$restaurant->save();
			return \Redirect::back()->with('message','Restaurant added.');
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
		$restaurant = \Restaurant::find($id);
		if($restaurant)
		{
			$restaurant->delete();
			return \Redirect::back()
						->with('message', 'Restaurant deleted.');
		}
		return \Redirect::back()
						->with('message', 'Restaurant does not exist.');
	}


}
