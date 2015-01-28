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
		$restaurants = Area::find($id)->restaurants;
		$area = Area::find($id);
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
        $cart = Cart::content();
            //return Response::json($cart);
		return View::make('restaurant.show', ['restaurant' => $restaurant, 'cart' => $cart, 'total' => Cart::total()]);

	}

	public function addToCart()
	{
		$food = Food::with(array('restaurants' => function($query)
        {
            $query->where('restaurants.id', '=', Input::get('restaurant_id'));

        }))->find(Input::get('id'));
        
        Cart::add([
            'id' => $food->id,
            'name' => $food->name,
            'qty' => Input::get('qty'),
            'price' => $food->restaurants->first()->pivot->price
        ]);
       
       return Redirect::back()->withMessage('Added to cart!');
                                               
	}
    
    public function removeItem()
	{  
        Cart::remove(Input::get('rowid'));
        return Redirect::back()->with('message', 'Item Removed from Cart'); 
    }
    
    public function updateItem($rowId)
	{  
        Cart::update($rowId, Input::get('qty'));            
        return Redirect::back()->with('message', 'Item updated'); 
    }
    
    public function clearCart()
	{
        Cart::destroy();
        return Redirect::back()->with('message', 'Cart Cleared');
    }
    
    public function showCart()
	{
        
        return View::make('cart', ['cart' => Cart::content()]);
                                               
	}


}
