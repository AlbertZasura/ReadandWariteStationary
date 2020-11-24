<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function create()
    {
        if (Auth::check() == true) {
            return redirect()->home();
        }
        return view('pages.login');
    }

    public function store()
    {
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required|alpha_num|min:6'
        ]);

        $user = User::where('email', request()->email)->first();
        Auth::login($user);

        return redirect()->home();
    }

    public function destroy(){
        Auth::logout();
        Session::forget('users');
        return redirect()->home();
    }

    public function checkLogin(Request $request) {
        if (Auth::check() == true) {
            return redirect()->home();
        }
        
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|alpha_num|min:6'
        ]);
        
        $user = array(
            'email'     => $request->get('email'),
            'password'  => $request->get('password')
        );

        $users_data = User::where('email', $user['email'])->first();
        if(Auth::attempt($user)) {
            Session::put('users', $users_data);
            return redirect('/home');
        } else {
            return back()->with('error', 'Wrong combination of Email and Password');
        }
    }

}