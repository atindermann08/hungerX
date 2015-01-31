<?php

/*location routes*/
Route::get('api/locations',array('uses'=>'ApiController@locations','as'=>'api.locations'));
Route::get('api/restaurants/{idArea}',array('uses'=>'ApiController@restaurantsByArea','as'=>'api.restaurantsbyarea'));
Route::get('api/restaurant/{id}',array('uses'=>'ApiController@restaurant','as'=>'api.restaurant'));


//Basic app routes
Route::get('/test',function(){return 'tested';});
Route::get('/', array('uses'=>'LocationController@locationSelectCity','as'=>'select.city'));
Route::post('/selectarea', array('uses'=>'LocationController@locationSelectArea','as'=>'select.area'));
//Route::post('/{cityId}-{cityName}', array('uses'=>'LocationController@locationSelectArea','as'=>'select.area'));
Route::post('/restaurants', array('uses'=>'RestaurantController@index','as'=>'restaurant.index'));
//Route::post('/restaurants/{cityId}-{cityName}/{areaId}-{areaName}', array('uses'=>'RestaurantController@index','as'=>'restaurants.list'));
Route::get('/restaurant/{restaurantId}', array('uses'=>'RestaurantController@show','as'=>'restaurant.show'));

// Confide routes
Route::get('users/create', ['uses' => 'UsersController@create', 'as' => 'auth.signup' ]);
Route::post('users', 'UsersController@store');
Route::get('users/login', ['uses' => 'UsersController@login', 'as' => 'auth.login']);
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', ['uses' => 'UsersController@logout', 'as' => 'auth.logout']);
                           

Route::post('cart/add', ['uses' => 'CartController@add', 'as' => 'cart.add'] );
Route::any('cart/clear/{restaurantId}', ['uses' => 'CartController@destroy', 'as' => 'cart.clear'] );
Route::any('cart/remove', ['uses' => 'CartController@remove', 'as' => 'cart.remove'] );
Route::post('cart/update', ['uses' => 'CartController@update', 'as' => 'cart.update'] );
Route::get('cart/show', ['uses' => 'CartController@show', 'as' => 'cart.show'] );

Route::any('cart/review', ['uses' => 'CartController@checkout', 'as' => 'cart.review'] );
Route::any('cart/checkout', ['uses' => 'CartController@checkout', 'as' => 'cart.checkout'] );

Route::any('customer/profile', ['uses' => 'CustomerController@profile', 'as' => 'customer.profile'] );
Route::get('customer/change_password', ['uses' => 'CustomerController@changePassword', 'as' => 'customer.password.change'] );
Route::post('customer/change_password/{id}', ['uses' => 'CustomerController@doChangePassword', 'as' => 'customer.password.doChange'] );
Route::any('customer/addresses', ['uses' => 'CustomerController@addresses', 'as' => 'customer.addresses'] );
Route::any('customer/orders', ['uses' => 'CustomerController@orders', 'as' => 'customer.orders'] );