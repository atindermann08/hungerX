<?php

namespace HungerExpert\Admin\controllers;

class AdminAccountsController extends \BaseController {

  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index()
  {
    $roles = \Role::all()->lists('name', 'id');
    return \View::make('admin.accounts.index')
      ->with('users', \User::with('addresses')->get())
      ->with('roles', $roles);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return Response
  */
  public function create()
  {
  }



  /**
  * Store a newly created resource in storage.
  *
  * @return Response
  */
  public function store()
  {
      $repo = \App::make('UserRepository');
      $user = $repo->signup(\Input::all());

      if ($user->id) {
        //confirm user and add role then work on show user page for showing adding addresses and orders and work on adminorderscontroller
        //index and show page to confirm and check order very important part and then last implement user and notification system with long pooling

        /* need to decide if mail should be sent on account creation on backend
        if (Config::get('confide::signup_email')) {
          Mail::queueOn(
            Config::get('confide::email_queue'),
            Config::get('confide::email_account_confirmation'),
            compact('user'),
            function ($message) use ($user) {
              $message
              ->to($user->email, $user->username)
              ->subject(Lang::get('confide::confide.email.account_confirmation.subject'));
            }
          );
      }*/

      return \Redirect::back()->with('message','Account added.')
      ->with('notice', \Lang::get('confide::confide.alerts.account_created'));
    } else {
      $error = $user->errors()->all(':message');
      return \Redirect::back()
        ->withInput(\Input::except('password'))
        ->with('error', $error);
    }
  }


  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return Response
  */
  public function show($id)
  {
    $restaurant = \Restaurant::with('foods','deliveryAreas')->find($id);
    return \View::make(
    'admin.restaurants.show',
    [
    'restaurant' => $restaurant
    ]);
  }


  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return Response
  */
  public function edit($id)
  {
    $cities = \City::all()->lists('name', 'id');
    $areas = \Area::all()->lists('name', 'id');
    $restaurant = \Restaurant::find($id);
    return \View::make('admin.restaurants.edit')
    ->with('restaurant', $restaurant)
    ->with('cities', $cities)
    ->with('areas', $areas);
  }


  /**
  * Update the specified resource in storage.
  *
  * @param  int  $id
  * @return Response
  */
  public function update($id)
  {
    $rules = \Restaurant::$rules;
    $rules['name'] = 'required|min:2';
    $rules['image'] = 'image|mimes:jpeg,jpg,png,bmp,gif';

    $validator = \Validator::make(\Input::all(), $rules);

    if($validator->passes())
    {
      $restaurant = \Restaurant::find($id);
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

      if(\Request::hasFile('image')){
        $image = \Input::file('image');
        \Image::make($image->getRealPath())
        ->resize(460,460)
        ->save('../public_html/assets/img/restaurants/'.$restaurant->id.'.jpg');
      }
      return \Redirect::back()->with('message','Restaurant added.');
    }

    return \Redirect::back()
    ->with('message','There were some errors. Please try again later..')
    ->withInput()
    ->withErrors($validator);
  }


  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return Response
  */
  public function destroy($id)
  {
    $user = \User::find($id);
    if($user)
    {
      $user->delete();
      return \Redirect::back()
      ->with('message', 'Account deleted.');
    }
    return \Redirect::back()
    ->with('message', 'Account does not exist.');
  }


  /**
  * Show the form for editing menu.
  *
  * @return Response
  */
  public function editMenu($id)
  {
    $restaurant = \Restaurant::with('foods')->find($id);
    $foods = \Food::whereNotIn('id', $restaurant->foods()->lists('food_id'))->get()->lists('name', 'id');
    return \View::make(
    'admin.restaurants.edit.menu',
    [
    'restaurant' => $restaurant,
    'foods' => $foods
    ]);
  }


  /**
  * Show the form for editing delivery areas.
  *
  * @return Response
  */
  public function editDeliveryAreas($id)
  {
    $restaurant = \Restaurant::with('area', 'deliveryAreas')->find($id);
    $countries = \Country::all()->lists('name', 'id');
    $states = \State::where('country_id', '=', $restaurant->area->city->state->country->id)->get()->lists('name', 'id');
    $cities = \City::where('state_id', '=', $restaurant->area->city->state->id)->get()->lists('name', 'id');
    $deliveryAreas = \Area::whereNotIn('id', $restaurant->deliveryAreas()->lists('area_id'))->get()->lists('name', 'id');
    return \View::make(
    'admin.restaurants.edit.delivery_areas',
    [
    'restaurant' => $restaurant,
    'deliveryAreas' => $deliveryAreas,
    'countries' => $countries,
    'states' => $states,
    'cities' => $cities
    ]);
  }


  /**
  * Show the form for adds food into menu.
  *
  * @return Response
  */
  public function addToMenu($restaurantId)
  {
    $restaurant = \Restaurant::find($restaurantId);

    $rules = [
    'food_id' => 'unique:food_restaurant,food_id,NULL,id,restaurant_id,'.$restaurantId,
    'price' => 'required|num	eric'
    ];

    $validator = \Validator::make(\Input::all(), $rules);

    if($validator->passes())
    {
      if($restaurant)
      {
        $restaurant->foods()->attach(
        \Input::get('food_id'),
        [
        'price' => \Input::get('price'),
        'in_stock' => \Input::get('in_stock')
        ]);
        return \Redirect::back()
        ->with('message', 'Food added to Menu.');
      }
      return \Redirect::back()
      ->with('message', 'Restaurant does not exist.');
    }

    return \Redirect::back()
    ->with('message','There were some errors. Please try again later..')
    ->withInput()
    ->withErrors($validator);
  }


  /**
  * Show the form for removes food from menu.
  *
  * @return Response
  */
  public function removeFromMenu($restaurantId, $foodId)
  {
    $restaurant = \Restaurant::find($restaurantId);
    if($restaurant)
    {
      $restaurant->foods()->detach(\Food::find($foodId));
      return \Redirect::back()
      ->with('message', 'Food removed from Menu.');
    }
    return \Redirect::back()
    ->with('message', 'Restaurant does not exist.');
  }


  /**
  * Show the form for toogling in stock.
  *
  * @return Response
  */
  public function toggleInStock($restaurantId, $foodId)
  {
    $restaurant = \Restaurant::find($restaurantId);
    $inStock = \Input::has('in_stock')?!(\Input::get('in_stock')):true;
    if($restaurant)
    {
      $restaurant->foods()->updateExistingPivot($foodId, array('in_stock' => $inStock));
      return \Redirect::back()
      ->with('message', 'Food state toggled.');
    }
    return \Redirect::back()
    ->with('message', 'Restaurant does not exist.');
  }

  /**
  * Show the form for adds area into delivery Areas.
  *
  * @return Response
  */
  public function addToDeliveryAreas($restaurantId)
  {
    $restaurant = \Restaurant::find($restaurantId);

    $rules = [
    'area_id' => 'unique:area_restaurant,area_id,NULL,id,restaurant_id,'.$restaurantId
    ];

    $validator = \Validator::make(\Input::all(), $rules);

    if($validator->passes())
    {
      if($restaurant)
      {
        $restaurant->deliveryAreas()->attach(\Input::get('area_id'));
        return \Redirect::back()
        ->with('message', 'Food added to Menu.');
      }
      return \Redirect::back()
      ->with('message', 'Restaurant does not exist.');
    }

    return \Redirect::back()
    ->with('message','There were some errors. Please try again later..')
    ->withInput()
    ->withErrors($validator);
  }


  /**
  * Show the form for removes area from delivery areas.
  *
  * @return Response
  */
  public function removeFromDeliveryAreas($restaurantId, $areaId)
  {
    $restaurant = \Restaurant::find($restaurantId);
    if($restaurant)
    {
      $restaurant->deliveryAreas()->detach(\Area::find($areaId));
      return \Redirect::back()
      ->with('message', 'Food removed from Menu.');
    }
    return \Redirect::back()
    ->with('message', 'Restaurant does not exist.');
  }


}
