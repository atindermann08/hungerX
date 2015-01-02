<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/about', function(){
    return 'About content goes here.';
});

/*location routes*/
Route::get('/location', function(){
    return 'list of cities along with their areas.';
});

Route::get('/cities', function(){
    return 'list of cities.';
});

Route::get('/areas/{idCity}', function(){
    return 'get list of areas in specified city';
});


/*restaurant routes*/
Route::get('/restaurants/{idArea}', function(){
    return 'get restaurants list delivering to specified area.';
});

Route::get('/restaurant/{idRestaurant}', function(){
    return 'get restaurat details.';
});


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

