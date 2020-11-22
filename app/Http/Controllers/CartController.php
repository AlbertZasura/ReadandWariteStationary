<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;

class CartController extends Controller
{
    public function create() {
        $users = Session::get('users');
        if($users == null) return view('pages.cart');
        else return view('pages.cart', ['users' => $users]);
    }

    public function show($cart) {
        $users = Session::get('users');
        $carts = Cart::all()->where('user_id', $cart);
        return view('pages.cart', ['users' => $users, 'carts' => $carts]);
        
    }
}