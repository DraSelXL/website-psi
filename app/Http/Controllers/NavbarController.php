<?php

namespace App\Http\Controllers;

use App\Models\HistoryLog;
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
        return view('inventory',[
            'materials' => Material::all()
        ]);
    }

    public function showHistory(){
        return view('history',[
            'histories' => HistoryLog::all()
        ]);
    }

    public function showAchievement(){
        return view('achievement');
    }
}
