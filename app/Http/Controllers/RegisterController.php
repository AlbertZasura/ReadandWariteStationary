<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    public function register() {
        return view('pages.register');
    }

    public function store(){
        User::create(request(['name','email','password']));

        return redirect('/');
    }

}