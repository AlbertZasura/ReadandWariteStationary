<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'WelcomeController@getIndex')->name('home');

Route::get('/login' , 'SessionController@create');
// Route::get('/logout' , 'SessionController@destroy');

Route::get('/register' , 'RegisterController@create');
Route::post('/register', 'RegisterController@store');

Route::get('/product/add', 'ProductController@create');
Route::post('/product/add', 'ProductController@store');
// Route::get('/member' , function() {
//   return view('pages.member');
// });

// Route::get('/admin' , function() {
//   return view('pages.admin');
// });