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
        $restaurant = Restaurant::find($restaurantId);
        $user = Confide::user();
        return View::make();
    }
    
    public function checkout(){
    
    }

}