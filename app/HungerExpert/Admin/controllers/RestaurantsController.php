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
						->with('restaurants', \Restaurant::with('area')->get());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$cities = \City::all()->lists('name', 'id');
		$areas = \Area::all()->lists('name', 'id');
		return \View::make('admin.restaurants.create')
						->with('cities', $cities)
						->with('areas', $areas);
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
			$restaurant->description = \Input::get('description');
			$restaurant->area_id = \Input::get('area_id');
			$restaurant->pure_veg = \Input::has('pure_veg')?\Input::get('pure_veg'):false;
			$restaurant->min_order = \Input::get('min_order');
			$restaurant->delivery_fee = \Input::get('delivery_fee');
			$restaurant->delivery_time = \Input::get('delivery_time');
			$restaurant->online_payment = \Input::get('online_payment')?\Input::get('online_payment'):false;
			$restaurant->cash_on_delivery = \Input::get('cash_on_delivery')?\Input::get('cash_on_delivery'):false;
			$restaurant->preorder = \Input::get('preorder')?\Input::get('preorder'):false;
			$restaurant->pickup = \Input::get('pickup')?\Input::get('pickup'):false;
			$restaurant->order_start_time = \Input::get('order_start_time');
			$restaurant->order_stop_time = \Input::get('order_stop_time');
			$restaurant->active = \Input::get('active')?\Input::get('active'):false;
			$restaurant->save();

			$image = \Input::file('image');
			\Image::make($image->getRealPath())
									->resize(460,460)
									->save('../public_html/assets/img/restaurants/'.$restaurant->id.'.jpg');

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
			\File::delete('../public_html/assets/img/restaurants/'.$id.'.jpg');
			$restaurant->delete();
			return \Redirect::back()
						->with('message', 'Restaurant deleted.');
		}
		return \Redirect::back()
						->with('message', 'Restaurant does not exist.');
	}


}
