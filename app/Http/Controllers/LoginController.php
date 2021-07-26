<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function toHome(){
        if(Auth::check()){
            if(auth()->user()->status == 2)
                return view('user-view');
            elseif (auth()->user()->status == 1)
                return view('admin-view');
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
            if(auth()->user()->status == 2)
                return view('user-view')->with("Wzzup pal! Welcome back!");
            elseif(auth()->user()->status == 1)
                return view('admin-view');
        }

        throw ValidationException::withMessages([
            'username' => 'Your provided credentials could not be verified.'
        ]);

    }
}
