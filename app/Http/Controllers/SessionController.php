<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create() {
        return view('pages.login');
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

    public function destory(){
        auth()->logout();

        return redirect()->home();
    }
}