<?php

namespace HungerExpert\Admin\controllers;

class FoodsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$foods = \Food::with('category')->get();
		$categories = \Category::all()->lists('name','id');
		return \View::make('admin.foods.index')
						->with('foods', $foods)
						->with('categories', $categories);
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
		$validator = \Validator::make(\Input::all(), \Food::$rules);

		if($validator->passes())
		{
			$food = new \Food;
			$food->name = \Input::get('name');
			$food->category_id = \Input::get('category_id');
			$food->veg = \Input::has('veg')?\Input::get('veg'):1;
			$food->save();
			return \Redirect::back()->with('message','Food added.');
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
		$food = \Food::find($id);
		if($food)
		{
			$food->delete();
			return \Redirect::back()
						->with('message', 'Food deleted.');
		}
		return \Redirect::back()
						->with('message', 'State does not exist.');
	}


}
