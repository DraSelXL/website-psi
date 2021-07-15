<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function toHome(){
        if(Auth::check()){
            return view('user-view');
        }else{
            return view('login');
        }
    }

    public function store(){
        $attributes = request()->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt($attributes)) {
            session()->regenerate();

            return view('user-view')->with("Wzzup pal! Welcome back!");
        }

        throw ValidationException::withMessages([
            'username' => 'Your provided credentials could not be verified.'
        ]);

    }
}
