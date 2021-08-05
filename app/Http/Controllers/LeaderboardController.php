<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaderboardController extends Controller
{
    function loadLeaderboard(){
        $players = DB::table('users')
                        ->where('status',2)
                        ->orderBy('points', 'desc')
                        ->orderBy('gold', 'desc')
                        ->get();
        echo json_encode($players);
    }

    function checkFreezeState(){
        $freeze_states = DB::table('miscellaneouses')
            ->get();
        foreach($freeze_states as $freeze_state){
            if($freeze_state->freeze_leaderboard==1){
                return -1;
            }
        }
        return 1;
    }
}
