<?php

class RestaurantController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /restaurants
	 *
	 * @return Response
	 */
	public function index()
	{
		$id = Input::get('area');
		$area = Area::find($id);
		$restaurants = $area->restaurants;//()->where('active', '=', '1')->get();;
		$city = $area->city;
		return View::make('restaurant.index',['restaurants' => $restaurants, 'area' => $area, 'city' => $city]);
	}

	/**
	 * Display the specified resource.
	 * GET /restaurant
	 *
	 * @param
	 * @return Response
	 */
	public function show($restaurantId)
	{
		$restaurant = Restaurant::with('foods')->find($restaurantId);
		//return Response::json($restaurant);
        $cart = Cart::instance($restaurantId)->content();
            //return Response::json($cart);
		return View::make(
				'restaurant.show',
				[
					'restaurant' => $restaurant,
					'cart' => $cart,
					'total' => Cart::instance($restaurantId)->total()
				]);

	}

}
