<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Material;
use App\Models\MiniGame;
use App\Models\Miscellaneous;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Sodium\increment;

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
                $groupByPos[] = [
                    'percentage' => $reward->percentage,
                    'material' => Material::find($reward->material_id),
                    'position' => $reward->position
                ];
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

        $finalres = [];
        foreach($res as $singleres){
            $finalres[] = [
                'team' => User::find($singleres[0]),
                'gold' => $singleres[1],
                'material' => Material::find($singleres[2])
            ];
        }

        DB::table('stats')
            ->where('user_id', $first)
            ->where('stat_item', 'Mini games won')
            ->increment('qty');

        return view('form-submit-result',[
            'results' => $finalres,
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
        $this->logGoldFromMinigame($teamID, $goldReward, $gameID, $pos);
        $this->logMaterialFromMinigame($teamID, $mtlID, $gameID, $pos);

        $goldFromMinigame = $this->sendGoldToUser($teamID, $goldReward);
        DB::table('stats')
            ->where('user_id', $teamID)
            ->where('stat_item', 'Golds collected')
            ->increment('qty', $goldFromMinigame);

        $materialGiven = $this->sendMaterialToUser($teamID, $mtlID);

        return [$teamID, $goldReward, $mtlID];
    }

    public function logGoldFromMinigame($teamID, $goldReward, $gameID, $pos){
        DB::table('history_logs')->insert([
            'type' => 1,
            'message' => $this->createGoldRewardSentence($goldReward, $gameID, $pos),
            'item_id' => 0,
            'user_id' => $teamID,
            'date_in' => date("Y-m-d H:i:s")
        ]);
    }

    public function logMaterialFromMinigame($teamID, $mtlID, $gameID, $pos){
        DB::table('history_logs')->insert([
            'type' => 1,
            'message' => $this->createMtlRewardSentence($mtlID, $gameID, $pos),
            'item_id' => 0,
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

    public function sendGoldToUser($teamID, $gold){
        $activeItems = DB::table('active_items')
            ->where('user_id', $teamID)
            ->where('active_status', 1)
            ->get();

        $totalGold = $gold;
        $goldFromEffect = 0;
        $convertedPts = 0;

        foreach($activeItems as $effect){
            switch($effect->item_id){
                case 2:
                    $goldFromEffect += $totalGold;
                    $totalGold *= 2;
                    $this->logGoldBoostRushHistory($teamID, 2, $goldFromEffect);
                    $this->reduceItemDuration($teamID, $effect->item_id);
                    break;
                case 3:
                    $goldFromEffect += $totalGold * 2;
                    $totalGold *= 3;
                    $this->logGoldBoostRushHistory($teamID, 3, $goldFromEffect);
                    $this->reduceItemDuration($teamID, $effect->item_id);
                    break;
                case 5:
                    $convertedPts = $totalGold / 2;
                    $totalGold /= 2;
                    $this->logBalanceJuice($teamID, $convertedPts);
                    $this->reduceItemDuration($teamID, $effect->item_id);
                    break;
            }
        }

        DB::table('users')
            ->where('id', $teamID)
            ->increment('gold', $totalGold);

        if($convertedPts > 0){
            DB::table('users')
                ->where('id', $teamID)
                ->increment('actual_points', $convertedPts);
            $misc = Miscellaneous::find(1);
            if($misc->freeze_leaderboard == 0)
                DB::table('users')
                    ->where('id', $teamID)
                    ->increment('points', $convertedPts);
        }
        return $totalGold;
    }

    public function sendMaterialToUser($teamID, $mtlID){
        $activeItems = DB::table('active_items')
            ->where('user_id', $teamID)
            ->where('active_status', 1)
            ->get();

        $theMtl = Material::find($mtlID);
        $itemGiven = 1;

        foreach($activeItems as $effect){
            switch($effect->item_id){
                case 4:
                    $itemGiven = $this->useCopycatDevice($teamID, $theMtl);
                    $this->reduceItemDuration($teamID, $effect->item_id);
                    break;
                case 6:
                    $itemGiven = $this->useHandOfMidas($teamID, $theMtl);
                    $this->reduceItemDuration($teamID, $effect->item_id);
                    break;
            }
        }

        if($itemGiven == 1)
            DB::table('materials_inventories')
                ->where('user_id', $teamID)
                ->where('material_id', $mtlID)
                ->increment('material_qty');
        return $itemGiven;
    }

    public function reduceItemDuration($teamID, $itemID){
        DB::table('active_items')
            ->where('user_id', $teamID)
            ->where('item_id', $itemID)
            ->decrement('times_left');
        $reducedRow = DB::table('active_items')
            ->where('user_id', $teamID)
            ->where('item_id', $itemID)
            ->first();
        if($reducedRow->times_left == 0){
            $theItem = Item::find($itemID);
            DB::table('active_items')
                ->where('user_id', $teamID)
                ->where('item_id', $itemID)
                ->update([
                    'active_status' => 0
                ]);
            DB::table('history_logs')
                ->insert([
                    'type' => 0,
                    'message' => 'The item ' . $theItem->name . '\'s effect duration has expired.',
                    'item_id' => $itemID,
                    'user_id' => $teamID,
                    'date_in' => date("Y-m-d H:i:s"),
                ]);
        }
    }

    public function useCopycatDevice($teamID, $mtl){
        $acc = [60, 50, 40, 30];
        $rand = rand(0,100);
        if($rand < $acc[$mtl->rarity-1]){
            DB::table('materials_inventories')
                ->where('user_id', $teamID)
                ->where('material_id', $mtl->id)
                ->increment('material_qty');
            DB::table('history_logs')
                ->insert([
                    'type' => 1,
                    'message' => 'You received a copy of ' . $mtl->name . ' from Copycat Device\'s effect.',
                    'item_id' => 4,
                    'user_id' => $teamID,
                    'date_in' => date("Y-m-d H:i:s")
                ]);
        }else
            DB::table('history_logs')
                ->insert([
                    'type' => 0,
                    'message' => 'Tough luck! You didn\'t receive anything from Copycat Device. Better luck next time.',
                    'item_id' => 4,
                    'user_id' => $teamID,
                    'date_in' => date("Y-m-d H:i:s")
                ]);

        return 1;
    }

    public function useHandOfMidas($teamID, $mtl){
        DB::table('users')
            ->where('id', $teamID)
            ->increment('gold', $mtl->price);
        DB::table('history_logs')
            ->insert([
                'type' => 1,
                'message' => 'You converted ' . $mtl->name . ' into ' . $mtl->price . ' G.',
                'item_id' => 6,
                'user_id' => $teamID,
                'date_in' => date("Y-m-d H:i:s")
            ]);
        DB::table('stats')
            ->where('user_id', $teamID)
            ->where('stat_item', 'Golds collected')
            ->increment('qty', $mtl->price);

        return 0;
    }

    public function logGoldBoostRushHistory($teamID, $itemID, $bonusGold){
        $theItem = Item::find($itemID);
        DB::table('history_logs')
            ->insert([
                'type' => 1,
                'message' => 'You have received ' . $bonusGold . ' G bonus gold from ' . $theItem->name . '\'s effect.',
                'item_id' => $itemID,
                'user_id' => $teamID,
                'date_in' => date("Y-m-d H:i:s")
            ]);
    }

    public function logBalanceJuice($teamID, $points){
        DB::table('history_logs')
            ->insert([
                'type' => 1,
                'message' => 'You have gained ' . $points . ' points from Balance Juice\'s effect by converting half of ' . $points * 2 . ' G into points',
                'item_id' => 5,
                'user_id' => $teamID,
                'date_in' => date("Y-m-d H:i:s")
            ]);
    }

    public function updateMisc(Request $request){
        $itemVal = null;
        $freezeVal = null;
        $finishVal = null;
        if($request->use_item == 'on') $itemVal = 1;
        else $itemVal = 0;
        if($request->freeze_leaderboard == 'on') $freezeVal = 1;
        else $freezeVal = 0;
        if($request->finish == 'on') $finishVal = 1;
        else $finishVal = 0;

        return DB::table('miscellaneouses')->update([
            'use_item' => $itemVal,
            'freeze_leaderboard' => $freezeVal,
            'finish' => $finishVal
        ]);
    }

    public function finishGame(){
        $this->giveEndGameBonus();
        $this->unfreezeLeaderboard();
        DB::table('miscellaneouses')
            ->update([
                'finish' => 1
            ]);

        return 1;
    }

    function giveEndGameBonus(){
        $categories = DB::table('stats')
            ->select('stat_item')
            ->distinct()->get();

        foreach($categories as $category){
            $biggest = DB::table('stats')
                ->where('stat_item', $category->stat_item)
                ->orderBy('qty', 'desc')
                ->first();
            if ($biggest->qty > 0){
                $uid = User::find($biggest->user_id)->id;
                $this->logEndGameBonus($uid, $biggest);

                $otherWinners = DB::table('stats')
                    ->where('stat_item', $category->stat_item)
                    ->where('user_id', '<>' , $uid)
                    ->where('qty', $biggest->qty)
                    ->get();

                if($otherWinners->count() > 0){
                    foreach ($otherWinners as $otherWinner){
                        $otherUid = User::find($otherWinner->user_id)->id;
                        $this->logEndGameBonus($otherUid, $otherWinner);
                    }
                }

            }
        }
    }

    function logEndGameBonus($uid, $stat){
        $sentences = [
            'Items used' => 'has the most items used!',
            'Materials/Items bought' => ' has the most materials/items bought!',
            'Achievements claimed' => ' has the most achievements claimed!',
            'Golds collected' => ' collects the most gold!',
            'Mini games won' => ' has the most mini games won!'
        ];
        DB::table('users')
            ->where('id', $uid)
            ->increment('actual_points', $stat->bonus_points);DB::table('users')
            ->where('id', $uid);
        DB::table('history_logs')->insert([
            'type' => 1,
            'message' => 'You have received ' . $stat->bonus_points . ' G as the team who ' . $sentences[$stat->stat_item],
            'item_id' => -1,
            'user_id' => $uid,
            'date_in' => date("Y-m-d H:i:s")
        ]);
    }

    function unfreezeLeaderboard(){
        DB::table('miscellaneouses')
            ->update([
                'freeze_leaderboard' => 0
            ]);
        $users = User::all();
        foreach($users as $user){
            DB::table('users')
                ->where('id', $user->id)
                ->update([
                    'points' => $user->actual_points
                ]);
        }
    }

    function giveToUser(Request $req){
        if($req->materialID != 'none')
            $this->giveMaterialToUser($req->teamID, $req->materialID, 1);

        if($req->itemID != 'none')
            $this->giveItemToUser($req->teamID, $req->itemID, 1);

        if($req->gold > 0)
            $this->giveGoldToUser($req->teamID, $req->gold);

        return 1;
    }

    function giveMaterialToUser($teamID, $materialID, $qty){
        $mtl = Material::find($materialID);
        DB::table('materials_inventories')
            ->where('user_id', $teamID)
            ->where('material_id', $materialID)
            ->increment('material_qty', $qty);
        DB::table('history_logs')->insert([
            'user_id' => $teamID,
            'type' => 1,
            'message' => 'You have received ' . $mtl->name . '(x' . $qty. ') [SYSTEM].',
            'item_ID' => -1,
            'date_in' => date("Y-m-d H:i:s")
        ]);
    }

    function giveItemToUser($teamID, $itemID, $qty){
        $item = Item::find($itemID);
        DB::table('items_inventories')
            ->where('user_id', $teamID)
            ->where('item_id', $itemID)
            ->increment('item_qty', $qty);
        DB::table('history_logs')->insert([
            'user_id' => $teamID,
            'type' => 1,
            'message' => 'You have received ' . $item->name . '(x' . $qty. ') [SYSTEM].',
            'item_ID' => -1,
            'date_in' => date("Y-m-d H:i:s")
        ]);
    }

    function giveGoldToUser($teamID, $qty){
        DB::table('users')
            ->where('id', $teamID)
            ->increment('gold', $qty);
        DB::table('history_logs')->insert([
            'user_id' => $teamID,
            'type' => 1,
            'message' => 'You have received ' . $qty . ' G [SYSTEM].',
            'item_ID' => -1,
            'date_in' => date("Y-m-d H:i:s")
        ]);
        DB::table('stats')
            ->where('user_id', $teamID)
            ->where('stat_item', 'Golds collected')
            ->increment('qty', $qty);
    }
}
