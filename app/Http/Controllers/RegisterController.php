<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create() {
        if(Auth::check()==true){
            return redirect()->home();
        }
        return view('pages.register');
    }

    public function store(){
        $this->validate(request(),[
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|alpha_num|min:6'
        ]);

        $user = User::create(request(['name','email','password']));

        Auth::login($user);

        return redirect()->home();
    }

}