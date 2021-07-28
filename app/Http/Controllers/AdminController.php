<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\MiniGame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public $prefix = ['st', 'nd', 'rd', 'th'];

    public function showPostGameForm(Request $req){
        $gameID = $req->gameID;
        $materialRewards = [];
        for ($i = 0; $i < 4; $i++){
            $materialRewards[] = DB::table('mini_game_material_rewards')
                ->where('mini_game_id', $gameID)
                ->where('position', $i+1)
                ->get();
        }

        $groupedMaterialRewards = [];
        foreach ($materialRewards as $posReward){
            $groupByPos = [];
            foreach($posReward as $reward){
                $groupByPos[] = Material::find($reward->material_id);
            }
            $groupedMaterialRewards[] = $groupByPos;
        }

        return view('admin-post-game-form',[
           'miniGame' => MiniGame::find($gameID),
           'goldRewards' => DB::table('mini_game_gold_rewards')->where('mini_game_id', $gameID)->get(),
            'materialRewards' => $groupedMaterialRewards
        ]);
    }


    public function submitPostGame(Request $request){
        $first = $request->pos1;
        $second = $request->pos2;
        $third = $request->pos3;
        $fourth = $request->pos4;
        $gameID = $request->gameID;

        $teams = [$first, $second, $third, $fourth];
        $res = [];
        for($i = 0; $i < 4; $i++){
            $res[] = $this->giveReward($teams[$i], $gameID, $i+1);
        }

        $teams = [];
        $golds = [];
        $materials = [];
        foreach($res as $singleres){
            $teams[] = $singleres[0];
            $golds[] = $singleres[1];
            $materials[] = Material::find($singleres[2]);
        }

        return view('form-submit-result',[
            'teams' => $teams,
            'golds' => $golds,
            'materials' => $materials
        ]);
    }

    public function giveReward($teamID, $gameID, $pos){
        $goldReward = DB::table('mini_game_gold_rewards')
            ->where('mini_game_id', $gameID)
            ->where('position', $pos)
            ->get();
        $goldReward = $goldReward[0]->qty;

        $rand = rand(0,100);
        $mtlRewards = DB::table('mini_game_material_rewards')
            ->where('mini_game_id', $gameID)
            ->where('position', $pos)
            ->get();
        $mtlID = null;
        foreach($mtlRewards as $reward){
            if($reward->cumulative > $rand){
                $mtlID = $reward->material_id;
                break;
            }
        }

        $this->logTeamHistory($teamID, $goldReward, $mtlID, $pos, $gameID);
        $this->sendRewardToUser($teamID, $goldReward, $mtlID);

        return [$teamID, $goldReward, $mtlID];
    }

    public function logTeamHistory($teamID, $goldReward, $mtlID, $pos, $gameID){
        DB::table('history_logs')->insert([
            'type' => 1,
            'message' => $this->createGoldRewardSentence($goldReward, $gameID, $pos),
            'user_id' => $teamID,
            'date_in' => date("Y-m-d H:i:s")
        ]);

        DB::table('history_logs')->insert([
            'type' => 1,
            'message' => $this->createMtlRewardSentence($mtlID, $gameID, $pos),
            'user_id' => $teamID,
            'date_in' => date("Y-m-d H:i:s")
        ]);
    }

    public function createMtlRewardSentence($mtlID, $gameID, $pos){
        $mtl = DB::table('materials')->where('id', $mtlID)->get();
        $game = DB::table('mini_games')->where('id', $gameID)->get();
        $mtlName = null;
        $gameName = null;
        foreach($mtl as $mat)
            $mtlName = $mat->name;
        foreach($game as $g)
            $gameName = $g->name;
        return 'You have received ' . $mtlName . ' for placing ' . $pos . $this->prefix[$pos-1] . ' at ' . $gameName . ' game.';
//        return 'You have received ' . $mtl->name;
    }

    public function createGoldRewardSentence($gold, $gameID, $pos){
        $game = MiniGame::find($gameID);
        return 'You have received ' . $gold . ' G for placing ' . $pos . $this->prefix[$pos-1] . ' at ' . $game->name . ' game.';
    }

    public function sendRewardToUser($teamID, $gold, $mtlID){
        DB::table('users')
            ->where('id', $teamID)
            ->increment('gold', $gold);

        DB::table('materials_inventories')
            ->where('user_id', $teamID)
            ->where('material_id', $mtlID)
            ->increment('material_qty');
    }
}
