<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function index() {
        if(auth()->guest()) {
            return redirect('/login');
        }else {
            return view('home');
        }
    }

    public function loginForm() {
        return view('login');
    }

    public function login(Request $request) {
        $this->validate($request, [
            'user' => 'required',
            'password' => 'required'
        ]);

        auth()->attempt([
            'user' => $request['user'],
            'password' => $request['password']
        ]);

        return redirect('/');
    }
}
