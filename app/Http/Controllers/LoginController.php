<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function toHome(){
//        if(Auth::check()){
//            return view('user-view',[
//                "firsttime" => "1"
//            ]);
//        }else{
//            return view('login');
//        }
        session('loadShop', true);
        return view('user-view');
    }

    public function store(){
        return view('user-view');
    }
}
