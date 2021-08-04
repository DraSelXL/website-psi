<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Material;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UseItemController extends Controller
{
    function gameStateCheck(){
        $states = DB::table('miscellaneouses')
            ->get();
        foreach($states as $state){
            if($state->use_item==0){
                return -1;
            }
        }
        return 1;
    }
    function useItem(Request $request){
        $user = Auth()->user();
        $itemID = $request->itemID;
        $itemName = $request->itemName;
        $itemEffect = $request->itemEffect;
        $itemQty = $request->itemQty;
        $durations = [1,3,1,3,1];
        $itemDuration = 0;
        if($itemQty<1){
            return 0;
        }
        $states = DB::table('miscellaneouses')
                        ->get();
        foreach($states as $state){
            if($state->use_item==0){
                return -2;
            }
        }
        $activeItems = DB::table('active_items')
                            ->where('user_id',$user->id)
                            ->get();

        if($itemID==1){
            DB::table('users')
                ->where('id', $user->id)
                ->increment('points', 300);
            DB::table('users')
                ->where('id', $user->id)
                ->increment('actual_points', 300);
        }else if($itemID == 7)
           return $itemID;
        else{
            foreach($activeItems as $item){
                if($item->active_status == 1 && $item->item_id == $itemID) return -1;
                if($itemID == 2 || $itemID==3){
                    if($item->active_status==1){
                        if($item->item_id == 2 || $item->item_id==3){
                            return -1;
                        }
                    }
                }
            }
            $itemDuration = $durations[$itemID - 2];

            DB::table('active_items')
                ->where('user_id',$user->id)
                ->where('item_id',$itemID)
                ->update([
                    'active_status' => 1,
                    'times_left' => $itemDuration
                ]);
        }


        DB::table('items_inventories')
            ->where('user_id', $user->id)
            ->where('item_id', $itemID)
            ->decrement('item_qty');

        DB::table('history_logs')->insert([
            'type' => 0,
            'user_id' => $user->id,
            'message' => 'You have used ' . $itemName  . ',  ' .$itemEffect,
            'item_id' => -1,
            'date_in' => date("Y-m-d H:i:s")
        ]);

        DB::table('stats')
            ->where('user_id', $user->id)
            ->where('stat_item', 'Items used')
            ->increment('qty');

        return 1;
    }

    public function useMissingSubstitute(){
        $user = Auth::user();
        $achievements = Achievement::all();
        $rowItems = [];
        foreach($achievements as $achievement){
            $requiredmtls = DB::table('achievement_mtls')
                ->where('achievement_id', $achievement->id)
                ->get();
            $missingMtlID = array();
            $ownedMtlID = array();
            foreach($requiredmtls as $requiredmtl){
                $usermtls = DB::table('materials_inventories')
                    ->where('user_id', $user->id)
                    ->get();
                foreach($usermtls as $usermtl){
                    if($usermtl->material_id == $requiredmtl->material_id &&
                    $usermtl->material_qty >= $requiredmtl->material_qty){
                        array_push($ownedMtlID, $usermtl->material_id);
                        break;
                    }
                }
            }
            foreach($requiredmtls as $requiredmtl){
                if(!in_array($requiredmtl->material_id, $ownedMtlID)){
                    $ownedQty = DB::table('materials_inventories')
                        ->where('user_id', $user->id)
                        ->where('material_id', $requiredmtl->material_id)
                        ->first();
                    $missingQty = $requiredmtl->material_qty - $ownedQty->material_qty;
                    if($missingQty == 1) array_push($missingMtlID, $requiredmtl->material_id);
                }

            }
            if(count($missingMtlID) == 1){
                $newRow = new \stdClass();
                $newRow->achievement = $achievement;
                $newRow->missingMtl = Material::find($missingMtlID[0]);
                $rowItems[] = $newRow;
            }
        }

        return view('useitem-modal',[
            'rows' => $rowItems
        ]);
    }

    public function subsMaterial(Request $request){
        $mtlID = $request->mtlID;
        $user = Auth::user();
        $mtl = Material::find($mtlID);

        DB::table('history_logs')
            ->insert([
                'user_id' => $user->id,
                'message' => 'You have substituted the item Missing Substitution for 1x ' . $mtl->name,
                'type' => 1,
                'item_id' => -1,
                'date_in' => date("Y-m-d H:i:s")
            ]);

        DB::table('materials_inventories')
            ->where('user_id', $user->id)
            ->where('material_id', $mtlID)
            ->increment('material_qty');

        DB::table('items_inventories')
            ->where('user_id', $user->id)
            ->where('item_id', 7)
            ->decrement('item_qty');

        DB::table('stats')
            ->where('user_id', $user->id)
            ->where('stat_item', 'Items used')
            ->increment('qty');

        return 1;
    }
}
