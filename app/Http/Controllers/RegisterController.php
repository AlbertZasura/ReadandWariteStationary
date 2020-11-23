<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function create()
    {
        if (Auth::check() == true) {
            return redirect()->home();
        }
        return view('pages.register');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|alpha_num|min:6'
        ]);

        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'member',
            'password' => bcrypt($request->password),
        ]);
        Auth::login($user);

        Session::put('users', $user);
        
        return redirect()->home();
    }
}
