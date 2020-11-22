<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use Validator;
use Auth;
use Session;
use App\User;
=======
use App\User;
use Illuminate\Support\Facades\Auth;
>>>>>>> 3ede0f8d41dd20509ff958acd218b25bf7f25ad3

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

<<<<<<< HEAD
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
=======
    public function destroy()
    {
        Auth::logout();
        return redirect()->home();
    }
}
>>>>>>> 3ede0f8d41dd20509ff958acd218b25bf7f25ad3
