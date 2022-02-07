<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class Auth1Controller extends Controller
{
    public function login()
    {
        return view('e_learning.auths.login');
    }

    public function postlogin(Request $request)
    {
        if(Auth::attempt($request->only('username','password'))){
            return redirect('mahasiswa');
        }

        return redirect('login1');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login1');
    }
}
