<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Session;
use App\User;

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

    public function destroy(){
        auth()->logout();
        Session::forget('users');
        return redirect()->home();
    }

    public function checkLogin(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|alpha_num|min:6'
        ]);
        
        $user = array(
            'email'     => $request->get('email'),
            'password'  => $request->get('password')
        );

        $users_data = User::all()->where('email', $user['email']);

        if(Auth::attempt($user)) {
            Session::put('users', $users_data);
            return redirect('/home');
        } else {
            return back()->with('error', 'Wrong Login Detail');
        }
    }

    public function successLogin() {
        return view('pages.home');
    }
}