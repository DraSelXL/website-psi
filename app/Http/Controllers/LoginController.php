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
                return redirect()->route('dashboard');
            elseif (auth()->user()->status == 1)
                return redirect()->route('demonlord');
        }else{
            return redirect()->route('login');
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
                return redirect()->route('dashboard');
            elseif(auth()->user()->status == 1)
                return redirect()->route('demonlord');
        }

        throw ValidationException::withMessages([
            'username' => 'Your provided credentials could not be verified.'
        ]);

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function showUser(){
        return view('user-view');
    }

    public function showAdmin(){
        return view('admin-view');
    }

    public function showLogin(){
        return view('login');
    }
}
