<?php

Route::get('/', function () {
    return view('index');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('product', 'Shop\Product');
Route::resource('cart', 'Shop\Cart');
Route::resource('address', 'Shop\Delivery');
Route::resource('payment', 'Shop\Payment');
