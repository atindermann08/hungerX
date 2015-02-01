<?php


class OrderController extends \BaseController
{
    public function index()
	{
        $orders = Order::with('address.area.city.state.country')
                      ->where('user_id', '=', Confide::user()->id)
                      ->orderBy('created_at', 'desc')
                      ->get();
		//return Response::json($orders);
        return View::make('customer.orders.index', ['orders' => $orders]);//->with('orders', $orders);

	}

	public function show($id)
	{
    $order = Order::with('address.area.city.state.country', 'items')->find($id);
		if($order->user_id == Confide::user()->id)
		{
			$order->total = Orderitem::where('order_id', '=', $id)->sum('price');
			//return Response::json($total);
			return View::make('customer.orders.show', ['order' => $order]);
		}
		else
		{
			return Redirect::route('customer.orders.index')->with('message','Mind your own orders.');
		}

	}
}
