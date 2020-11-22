<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public function create() {
        $users = Session::get('users');
        if($users == null) return view('pages.cart');
        else return view('pages.cart', ['users' => $users]);
    }
}