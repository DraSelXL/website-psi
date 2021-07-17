<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\AchievementMtl;
use App\Models\HistoryLog;
use App\Models\Material;
use App\Models\MaterialsInventory;
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
            'materials' => Material::all(),
            'achievements'=> Achievement::all()
        ]);
    }

    public function showHistory(){
        return view('history',[
            'histories' => HistoryLog::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function showAchievement(){
        return view('achievement',[
            'materials' => Material::all(),
            'achievements' => Achievement::all(),
            'achievementMtls' => AchievementMtl::all(),
            'materialsInventories' => MaterialsInventory::where('user_id', auth()->user()->id)->get(),
        ]);
    }
}
