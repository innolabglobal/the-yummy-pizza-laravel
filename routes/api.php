<?php

use Illuminate\Http\Request;

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
Route::resource('price_options', 'PriceOptionAPIController')->only(['index', 'show']);
Route::resource('orders', 'OrderAPIController')->only(['index', 'show']);
Route::resource('order_items', 'OrderItemAPIController')->only(['index', 'show']);

Route::post('place-orders', 'OrderAPIController@placeOrder');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout', 'AuthAPIController@logout')->name('logout');
    Route::get('place-orders', 'OrderAPIController@getOrderHistory');
});
