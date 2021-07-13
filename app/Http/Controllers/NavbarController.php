<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function showShop(){
        return view('shop');
    }

    public function showInventory(){
        return view('inventory');
    }

    public function showHistory(){
        return view('history');
    }

    public function showAchievement(){
        return view('achievement');
    }
}
