<?php

// Auth routes
Auth::routes();

// home page
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');

// Show products
Route::resource('product', 'Shop\Product');

// product search
Route::get('search/{keyword}','Shop\Product@search');

// cart manages
Route::resource('cart', 'Shop\Cart')->middleware('checkout');

// Wishlist controller
Route::post('like','Shop\Favorite@like')->middleware('checkout');
Route::resource('favorite', 'Shop\Favorite')->middleware('checkout');
Route::get('addtocart','Shop\Favorite@addtocart')->middleware('checkout');

// Delivery address
Route::resource('address', 'Shop\Delivery')->middleware('checkout');

// order processing
Route::resource('order','Shop\Order')->middleware('checkout');

// route for processing payment
Route::resource('payment', 'Shop\PaymentController')->middleware('checkout');
Route::post('paypal', 'Shop\PaymentController@payWithpaypal')->middleware('checkout');
Route::get('status', 'Shop\PaymentController@getPaymentStatus')->middleware('checkout');
Route::get('paymentstatus', 'Shop\PaymentController@index')->middleware('checkout');

// Contacts
Route::get('contact','Shop\Contact@index');
// category wise search
Route::get('{slug}/{slug2}/{start?}/{end?}', 'Shop\Product@categorysearch')->where('slug', 'mens|womans|kids');
