<?php

namespace App\Http\Controllers;

use App\Models\AchievementsInventory;
use App\Models\Achievement;
use App\Models\AchievementMtl;
use App\Models\HistoryLog;
use App\Models\Item;
use App\Models\Material;
use App\Models\MaterialsInventory;
use App\Models\Stat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NavbarController extends Controller
{
    public function showShop(){
        return view('shop',[
            'materials' => Material::all(),
            'items' => Item::all()
        ]);
    }

    public function showInventory(){
        return view('inventory',[
            'materials' => Material::all(),
            'achievements'=> Achievement::all(),
            'materialsInventories' => MaterialsInventory::where('user_id', auth()->user()->id)->get(),
            'achievementInvent' => AchievementsInventory::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function showHistory(){
        return view('history',[
            'histories' => DB::table('history_logs')->where('user_id', auth()->user()->id)->orderBy('date_in','desc')->get()
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

    public function showStats(){
        return view('stats',[
            'stats' => Stat::where('user_id', auth()->user()->id)->get(),
            'user' => User::where('id', auth()->user()->id)->get()
        ]);
    }

    public function updateGAP(){
        $user = Auth()->user();
        return $user->gold . 'G, ' . $user->points . 'pts';
    }
}
