<?php


/**
 * API Routes
 */
//Wordpress Routes - To be called from wordpress site:
Route::group(['middleware' => 'auth.basic'], function () {
    Route::post('/api/v1/order_items/create/{order_id}', 'ApiController@createOrderFromId')->name('createOrder');
});
