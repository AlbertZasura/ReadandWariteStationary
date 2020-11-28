<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'ProductTypeController@index');
Auth::routes();
// Route::get('/login' , 'SessionController@create');
// Route::post('/login/auth', 'SessionController@checkLogin');
// Route::get('/logout' , 'SessionController@destroy');

// Route::get('/register', 'RegisterController@create');
// Route::post('/register', 'RegisterController@store');

Route::get('/home', 'ProductController@index')->name('home');

Route::get('/product/add', 'ProductController@create')->middleware('isAdmin');
Route::post('/product/add', 'ProductController@store')->middleware('isAdmin');
Route::get('/product/{product}', 'ProductController@show');
Route::get('/product/{product}/edit', 'ProductController@edit')->middleware('isAdmin');
Route::patch('/product/{product}/edit', 'ProductController@update')->middleware('isAdmin');
Route::delete('/product/{product}/delete', 'ProductController@destroy')->middleware('isAdmin');

Route::get('/productType/add', 'ProductTypeController@create')->middleware('isAdmin');
Route::post('/productType/add', 'ProductTypeController@store')->middleware('isAdmin');
Route::get('/productType/edit', 'ProductTypeController@edit')->middleware('isAdmin');
Route::patch('/productType/{productType}/update', 'ProductTypeController@update')->middleware('isAdmin');
Route::delete('/productType/{productType}/delete', 'ProductTypeController@destroy')->middleware('isAdmin');

Route::get('/transaction', 'TransactionController@index')->middleware('isMember');

Route::get('/cart', 'CartController@show')->middleware('isMember');
Route::get('/cart/{carts}/update', 'CartController@update')->middleware('isMember');
Route::patch('/cart/{carts}/update', 'CartController@update')->middleware('isMember');
Route::delete('/cart/{carts}/delete', 'CartController@destroy')->middleware('isMember');
Route::post('/cart/checkout', 'CartController@checkOut')->middleware('isMember');
Route::post('/cart/add/{productId}', 'CartController@add')->middleware('isMember');
Route::patch('/cart/update/{carts}', 'CartController@fecth')->middleware('isMember');


//Testing Cookie
// Route::get('/cookie/set', 'CookieController@setCookie');
// Route::get('/cookie/get', 'CookieController@getCookie');



// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
