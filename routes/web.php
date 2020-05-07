<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')
    ->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')
    ->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')
    ->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')
    ->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')
    ->name('io_generator_builder_rollback');

Route::post('generator_builder/generate-from-file', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile')
    ->name('io_generator_builder_generate_from_file');


Route::resource('menus', 'MenuController');

Route::resource('priceOptions', 'PriceOptionController');


Route::resource('orders', 'OrderController');

Route::resource('orderItems', 'OrderItemController');

Route::resource('addresses', 'AddressController');

Route::resource('deliverablePostCodes', 'DeliverablePostCodeController');