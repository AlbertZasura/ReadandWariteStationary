<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    public function create() {
        return view('pages.register');
    }

    public function store(){
        $this->validate(request(),[
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|alpha_num|min:6'
        ]);

        $user = User::create(request(['name','email','password']));

        auth()->login($user);

        return redirect()->home();
    }

}