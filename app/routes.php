<?php

/*location routes*/
Route::get('api/locations',array('uses'=>'ApiController@locations','as'=>'api.locations'));
Route::get('api/restaurants/{idArea}',array('uses'=>'ApiController@restaurantsByArea','as'=>'api.restaurantsbyarea'));
Route::get('api/restaurant/{id}',array('uses'=>'ApiController@restaurant','as'=>'api.restaurant'));


//Basic app routes
Route::get('/', array('uses'=>'LocationController@locationSelectCity','as'=>'select.city'));
Route::post('/', array('uses'=>'LocationController@locationSelectArea','as'=>'select.area'));
Route::post('/restaurants/{idArea}', array('uses'=>'RestaurantController@index','as'=>'restaurants.list'));

/*cart routes */
Route::get('/cart', function(){
    return 'Create cart and add items.';
});

Route::post('/cart/{idCart}', function(){
    return 'add item to cart and return complete cart details';
});

Route::post('/cart/{idCart}/{idItem}', function(){
    return 'update item quantity in cart';
});

Route::delete('/cart/{idCart}/{idItem}', function(){
    return 'remove item from cart';
});

Route::post('/cart/{idCart}/clear', function(){
    return 'clear cart items';
});

Route::get('/cart/{idCart}', function(){
    return 'get complete cart details.';
});

Route::get('/cart/{idCart}/products', function(){
    return 'get list of cart products';
});

Route::get('/cart/{idCart}/total', function(){
    return 'Get cart total amount.';
});


//user routes
/*
Route::post('/user', 'addUser');
Route::get('/user/auth/:id', 'authenticateUser');
Route::put('/user/:id', 'updateUser');
Route::get('/user/:id', 'getUserDetails');
*/

//order routes
/*
Route::get('/orders/:id_user', 'getUserOrders');
Route::post('/order/:id_cart', 'addOrder');
Route::put('/order/:id_cart', 'updateOrder');
*/


/*if (file_exists(__DIR__.'/controllers/Server.php')) {
    Route::get('/deploy', 'Server@deploy');
}*/
//

// Confide routes
Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');
