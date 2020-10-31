<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'WelcomeController@getIndex')->name('home');

// Route::get('/login' , 'LoginController@getLogin');

Route::get('/register' , 'RegisterController@create');
Route::post('/register', 'RegisterController@store');

// Route::get('/member' , function() {
//   return view('pages.member');
// });

// Route::get('/admin' , function() {
//   return view('pages.admin');
// });