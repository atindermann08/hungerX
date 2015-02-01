<?php

class CartController extends \BaseController {


	public function add()
	{
		$food = Food::with(array('restaurants' => function($query)
        {
            $query->where('restaurants.id', '=', Input::get('restaurant_id'));

        }))->find(Input::get('id'));

        Cart::instance(Input::get('restaurant_id'))->add([
            'id' => $food->id,
            'name' => $food->name,
            'qty' => Input::get('qty'),
            'price' => $food->restaurants->first()->pivot->price
        ]);

       return Redirect::back()->withMessage('Added to cart!');

	}

  public function remove()
	{
        Cart::instance(Input::get('restaurant_id'))->remove(Input::get('rowid'));
        return Redirect::back()->with('message', 'Item Removed from Cart');
  }

  public function update($rowId)
	{
        Cart::instance(Input::get('restaurant_id'))->update($rowId, Input::get('qty'));
        return Redirect::back()->with('message', 'Item updated');
    }

	public function show()
	{
		return View::make('cart', ['cart' => Cart::instance(Input::get('restaurant_id'))->content()]);
	}

	public function destroy($restaurantId)
	{
        Cart::instance($restaurantId)->destroy();
        return Redirect::back()->with('message', 'Cart Cleared');
	}

  public function review($restaurantId){
        $cart = Cart::instance($restaurantId)->content();
        $restaurant = Restaurant::with('area.city.state.country')->find($restaurantId);
    		$defaultAddress = Confide::user()->defaultAddress;
    		$addresses = Confide::user()->addresses;
        $user = Confide::user();
    		//return Response::json($restaurant);
        return View::make('cart.review')
    			->with('cart', $cart)
    			->with('restaurant', $restaurant)
    			->with('user', $user)
    			->with('addresses', $addresses)
    			->with('defaultAddress', $defaultAddress)
    			->with('total', Cart::instance($restaurantId)->total());
    }

    public function checkout($restaurantId){
      $cart = Cart::instance($restaurantId)->content();

			$order = Order::create([
				'user_id' => Confide::user()->id,
				'restaurant_id' => $restaurantId,
				'address_id' => Input::get('address'),
				'pickup' => Input::get('pickup'),
				'delivery_later' => Input::has('delivery_later')?Input::get('delivery_later'):false,
				'delivery_date' => Input::has('delivery_date')?Input::get('delivery_date'):date("Y-m-d"),
				'delivery_time' => Input::has('delivery_time')?Input::get('delivery_time'):date("H:i:s"),
				'payment_status' => 'Pending',
				'payment_type' => 'Online',
				'delivery_status' => 'Under Processing'
				]);

			foreach($cart as $key => $item)
			{
				$order->items()->save(OrderItem::create([
					'food_id' => $item->id,
					'name' => $item->name,
					'price' => $item->subtotal,
					'quantity' => $item->qty
					]));
			}

			$cart = Cart::instance($restaurantId)->destroy();
      return Redirect::route('customer.orders.index')
      	->with('message', 'Order Saved with id '.$order->id);

    }

}
