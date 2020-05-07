<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'AuthAPIController@login')->name('login');
Route::post('register', 'AuthAPIController@register')->name('register');

Route::resource('menus', 'MenuAPIController')->only(['index', 'show']);
Route::resource('deliverable_post_codes', 'DeliverablePostCodeAPIController')->only(['index', 'show']);
//Route::resource('price_options', 'PriceOptionAPIController')->only(['index', 'show']);
//Route::resource('orders', 'OrderAPIController')->only(['index', 'show']);
//Route::resource('order_items', 'OrderItemAPIController')->only(['index', 'show']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::group(['prefix' => 'own'], function () {
        Route::get('addresses', 'AddressAPIController@indexOwn');
        Route::post('addresses', 'AddressAPIController@storeOwn');
        Route::get('orders', 'OrderAPIController@getOrderHistory');
        Route::get('orders/{id}', 'OrderAPIController@getOrderHistoryDetails');
        Route::post('orders', 'OrderAPIController@placeOrder');
    });

    Route::post('logout', 'AuthAPIController@logout')->name('logout');
});



