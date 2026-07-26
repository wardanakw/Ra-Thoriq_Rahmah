<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function proses(Request $request)
    {

        $credential = [

            'username'=>$request->username,

            'password'=>$request->password

        ];

        if(Auth::attempt($credential)){

            $request->session()->regenerate();

            if(Auth::user()->role=="admin"){

                return redirect('/admin/dashboard');

            }

            return redirect('/guru/dashboard');

        }

        return back()->with('error','Username atau Password Salah');

    }

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

    }

}