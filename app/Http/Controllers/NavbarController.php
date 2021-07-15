<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function showShop(){
        return view('shop',[
            'materials' => Material::all()
        ]);
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
