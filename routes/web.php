<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'ProductTypeController@index');

Route::get('/login' , 'SessionController@create');
Route::post('/login/auth', 'SessionController@checkLogin');
Route::get('/logout' , 'SessionController@destroy');

Route::get('/register', 'RegisterController@create');
Route::post('/register', 'RegisterController@store');

Route::get('/home', 'ProductController@index')->name('home');

Route::get('/product/add', 'ProductController@create');
Route::post('/product/add', 'ProductController@store');
Route::get('/product/{product}', 'ProductController@show');
Route::get('/product/{product}/edit', 'ProductController@edit');
Route::patch('/product/{product}/edit', 'ProductController@update');
Route::delete('/product/{product}/delete', 'ProductController@destroy');

Route::get('/productType/add', 'ProductTypeController@create');
Route::post('/productType/add', 'ProductTypeController@store');
Route::get('/productType/edit', 'ProductTypeController@edit');
Route::patch('/productType/{productType}/update', 'ProductTypeController@update');
Route::delete('/productType/{productType}/delete', 'ProductTypeController@destroy');

Route::get('/transaction', 'TransactionController@index');

Route::get('/cart', 'CartController@create');
Route::get('/cart/{userId}', 'CartController@show');
// Route::get('/member' , function() {
//   return view('pages.member');
// });

// Route::get('/admin' , function() {
//   return view('pages.admin');
// });