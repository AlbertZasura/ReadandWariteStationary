<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

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

    public function destroy()
    {
        Auth::logout();
        return redirect()->home();
    }
}
