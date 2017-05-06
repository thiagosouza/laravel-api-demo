<?php

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

Route::get('names', function()
{
    return array(
      1 => "John",
      2 => "Mary",
      3 => "Steven"
    );
});

Route::resource('product', 'ProductController');
Route::resource('client', 'ClientController');
Route::resource('order', 'OrderController');

Route::get('/', function () {
    return view('welcome');
		// Route::post('/order', 'OrderController@save');
});

//return App\Order::save(json_encode('{"foo":"bar"}'))
