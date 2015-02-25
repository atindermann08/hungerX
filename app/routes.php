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


//cart
Route::post(
'cart/add',
['uses' => 'CartController@add',
'as' => 'cart.add'
] );
Route::any(
'cart/clear/{restaurantId}',
['uses' => 'CartController@destroy',
'as' => 'cart.clear'
] );
Route::any(
'cart/remove',
['uses' => 'CartController@remove',
'as' => 'cart.remove'
] );
Route::post(
'cart/update',
['uses' => 'CartController@update',
'as' => 'cart.update'
] );
Route::get(
'cart/show',
[
'uses' => 'CartController@show',
'as' => 'cart.show'
] );

Route::group(array('before' => 'customer'), function()
{
	Route::any(
	'cart/review/{restaurantId}',
	[
	'uses' => 'CartController@review',
	'as' => 'cart.review'
	] );
	Route::any(
	'cart/checkout/{restaurantId}',
	[
	'uses' => 'CartController@checkout',
	'as' => 'cart.checkout'
	] );


	//custoer profile
	Route::get(
	'customer/profile',
	[
	'uses' => 'CustomerController@profile',
	'as' => 'customer.profile'
	] );
	Route::post(
	'customer/profile/{id}',
	[
	'uses' => 'CustomerController@doUpdateProfile',
	'as' => 'customer.profile.doUpdate'
	] );

	Route::get(
	'customer/change_password',
	[
	'uses' => 'CustomerController@changePassword',
	'as' => 'customer.password.change'
	] );
	Route::post(
	'customer/change_password/{id}',
	[
	'uses' => 'CustomerController@doChangePassword',
	'as' => 'customer.password.doChange'
	] );


	//customer address
	Route::get(
	'customer/addresses',
	[
	'uses' => 'AddressController@index',
	'as' => 'customer.address.index'
	] );
	Route::get(
	'customer/addresses/add',
	[
	'uses' => 'AddressController@add',
	'as' => 'customer.address.add'
	] );
	Route::post(
	'customer/addresses/add',
	[
	'uses' => 'AddressController@doAdd',
	'as' => 'customer.address.doAdd'
	] );
	Route::get(
	'customer/addresses/edit/{id}',
	[
	'uses' => 'AddressController@edit',
	'as' => 'customer.address.edit'
	] );
	Route::post(
	'customer/addresses/edit/{id}',
	[
	'uses' => 'AddressController@doEdit',
	'as' => 'customer.address.doEdit'
	] );
	Route::any(
	'customer/addresses/default/{id}',
	[
	'uses' => 'AddressController@setDefault',
	'as' => 'customer.address.default'
	] );


	//orders
	Route::get(
	'customer/orders',
	[
	'uses' => 'OrderController@index',
	'as' => 'customer.orders.index'
	]);

	Route::get(
	'customer/orders/{id}',
	[
	'uses' => 'OrderController@show',
	'as' => 'customer.orders.show'
	]);
});

Route::group(array('prefix' => 'admin'), function()
{
	Route::get('dashboard',[
		'uses' => '\HungerExpert\Admin\controllers\AdminController@dashboard',
		'as' => 'admin.dashboard']);

	Route::resource('countries','\HungerExpert\Admin\controllers\AdminCountriesController');
	Route::resource('states','\HungerExpert\Admin\controllers\AdminStatesController');
	Route::resource('cities','\HungerExpert\Admin\controllers\AdminCitiesController');
	Route::resource('areas','\HungerExpert\Admin\controllers\AdminAreasController');

	Route::resource('categories','\HungerExpert\Admin\controllers\AdminCategoriesController');
	Route::resource('foods','\HungerExpert\Admin\controllers\AdminFoodsController');
	Route::resource('restaurants','\HungerExpert\Admin\controllers\AdminRestaurantsController');

	Route::get('restaurants/{id}/menu/edit',[
		'uses' => '\HungerExpert\Admin\controllers\AdminRestaurantsController@editMenu',
		'as' => 'admin.restaurants.menu.edit'
		]);

	Route::delete('restaurants/{restaurantId}/menu/remove/{foodId}',[
		'uses' => '\HungerExpert\Admin\controllers\AdminRestaurantsController@removeFromMenu',
		'as' => 'admin.restaurants.menu.remove'
		]);

	Route::post('restaurants/{restaurantId}/menu/toggle/{foodId}',[
		'uses' => '\HungerExpert\Admin\controllers\AdminRestaurantsController@toggleInStock',
		'as' => 'admin.restaurants.menu.toggle'
		]);

	Route::post('restaurants/{restaurantId}/menu/add',[
		'uses' => '\HungerExpert\Admin\controllers\AdminRestaurantsController@addToMenu',
		'as' => 'admin.restaurants.menu.add'
		]);

	Route::post('restaurants/{restaurantId}/delivery_areas/add',[
		'uses' => '\HungerExpert\Admin\controllers\AdminRestaurantsController@addToDeliveryAreas',
		'as' => 'admin.restaurants.delivery_areas.add'
		]);

	Route::delete('restaurants/{restaurantId}/delivery_areas/destroy/{areaId}',[
		'uses' => '\HungerExpert\Admin\controllers\AdminRestaurantsController@removeFromDeliveryAreas',
		'as' => 'admin.restaurants.delivery_areas.remove'
		]);

	Route::get('restaurants/{id}/delivery_areas/edit',[
		'uses' => '\HungerExpert\Admin\controllers\AdminRestaurantsController@editDeliveryAreas',
		'as' => 'admin.restaurants.delivery_areas.edit'
		]);

	Route::delete('roles/{roleId}/permissions/destroy/{permissionId}',[
		'uses' => '\HungerExpert\Admin\controllers\AdminRolesController@destroyPermission',
		'as' => 'admin.roles.permission.destroy'
		]);

	Route::post('roles/{roleId}/permissions/store',[
		'uses' => '\HungerExpert\Admin\controllers\AdminRolesController@storePermission',
		'as' => 'admin.roles.permission.store'
		]);

	Route::resource('roles','\HungerExpert\Admin\controllers\AdminRolesController');
	Route::resource('permissions','\HungerExpert\Admin\controllers\AdminPermissionsController');

	Route::get('orders',[
		'uses' => '\HungerExpert\Admin\controllers\AdminController@order',
		'as' => 'admin.order']);

});

//Entrust::routeNeedsRole( 'admin/*', array('Super Admin','Admin'), Redirect::to('/users/login')  , false );
