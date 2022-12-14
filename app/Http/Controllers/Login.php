<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function index(){
        $param = [
            "title"=>"Login"
        ];
        return view ('login');
    }

    public function signin(Request $request){
        $credentials = $request->validate(
            [
                "email"=>"required|email",
                "password"=>"required"
            ]
            );
        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect('/');
        }
        return back()->with('loginerror','Login Gagal');
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect (url('login'));
    }
}
