<?php

namespace App\Http\Controllers;

use App\Models\AchievementsInventory;
use App\Models\Achievement;
use App\Models\AchievementMtl;
use App\Models\HistoryLog;
use App\Models\Item;
use App\Models\Material;
use App\Models\MaterialsInventory;
use App\Models\MiniGame;
use App\Models\Stat;
use App\Models\User;
use App\View\Components\ItemInventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'achievementInvent' => AchievementsInventory::where('user_id', auth()->user()->id)->get(),
            'itemsInvent'=> DB::table('items_inventories')->where('user_id', auth()->user()->id)->get(),
            'items'=>Item::all()
        ]);
    }

    public function showHistory(){
        return view('history',[
            'histories' => DB::table('history_logs')
                ->where('user_id', auth()->user()->id)
                ->orderBy('date_in','desc')
                ->orderBy('item_id', 'desc')
                ->get()
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

    public function adminShowPostGameInput(){
        return view('admin-post-game',[
            'mini_games' => DB::table('mini_games')->where('status',1)->get()
        ]);
    }

    public function adminShowLeaderboard(){
        return view('admin-leaderboard',[
            'teams' => DB::table('users')
                ->where('status',2)
                ->orderBy('actual_points','desc')
                ->orderBy('gold','desc')->get()
        ]);
    }

    public function adminShowTeamStats(){
        $teams = DB::table('users')
            ->where('status',2)
            ->get();

        $row = [];

        foreach($teams as $team){
            $teamStats = DB::table('stats')
                ->where('user_id', $team->id)
                ->get();
            $obj = new \stdClass();
            $obj->team = $team;
            $obj->stats = [
                'teamStats' => $teamStats,
                'color' => []
            ];
            foreach ($obj->stats['teamStats'] as $stat){
                $col = '';
                switch($stat->stat_item){
                    case 'Items used':
                        $this->checkMaxStat($stat->stat_item, $stat->qty) == true ? $col = ' bg-green-500 ' : $col = '';
                        break;
                    case 'Materials/Items bought':
                        $this->checkMaxStat($stat->stat_item, $stat->qty) == true ? $col = ' bg-blue-500 ' : $col = '';
                        break;
                    case 'Achievements claimed':
                        $this->checkMaxStat($stat->stat_item, $stat->qty) == true ? $col = ' bg-pink-400 ' : $col = '';
                        break;
                    case 'Golds collected':
                        $this->checkMaxStat($stat->stat_item, $stat->qty) == true ? $col = ' bg-purple-600 ' : $col = '';
                        break;
                    case 'Mini games won':
                        $this->checkMaxStat($stat->stat_item, $stat->qty) == true ? $col = ' bg-yellow-400 ' : $col = '';
                        break;
                    default:
                        $col = '';
                }
                if($col != '') $col .= 'font-bold text-white';
                $obj->stats['color'][] = $col;
            }
            $row[] = $obj;
        }

        return view('admin-teamstats',[
            'rows' => $row
        ]);
    }

    public function checkMaxStat($statItem, $teamQty){
        $maxQty = DB::table('stats')
            ->select('qty')
            ->where('stat_item', $statItem)
            ->orderBy('qty','desc')
            ->first();

        if($maxQty->qty == 0) return 0;

         return $maxQty->qty == $teamQty;
    }

    public function adminShowTeamHistory(){
        $logs = DB::table('history_logs')
            ->orderBy('user_id')
            ->orderBy('date_in','desc')
            ->orderBy('item_id', 'desc')
            ->get();
        $res = [];

        foreach($logs as $log){
            $newObject = new \stdClass();
            $newObject->log = $log;
            $newObject->team = DB::table('users')
                ->where('id', $log->user_id)
                ->get()[0];
            $res[] = $newObject;
        }

        return view('admin-teamhistory',[
            'histories' => $res
        ]);
    }

    public function adminShowMisc(){
        return view('admin-misc',[
            'misc'=>DB::table('miscellaneouses')->get()[0]
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
