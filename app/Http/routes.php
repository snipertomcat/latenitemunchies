<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function() {
    return view('login');
});

/**
 * API Routes
 */
//Wordpress Routes - To be called from wordpress site:
Route::group(['middleware' => 'auth.basic'], function() {
    Route::get('/api/v1/order/{id?}', function($id=null) {
        if ($id == null) {
            $order = \App\Order::all(['*']);
        } else {
            $order = \App\Order::find($id, ['*']);
        }
    });
    Route::post('/api/v1/order', function($orderData) {
        if (!$orderData) {
            return new Response(400, json_encode('No Order Data Received'));
        } else {
            $order = new \App\Order();
            print_r($orderData);
        }
    });
});
Route::auth();

Route::get('/home', 'HomeController@index');
