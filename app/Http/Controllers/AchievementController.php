<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\AchievementMtl;
use App\Models\Material;
use App\Models\MaterialsInventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AchievementController extends Controller
{
    public function search(Request $request){
        $keyword = $request->search;
        $searchedMaterials = DB::table('materials')
            ->where('name', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%')
        ->get();

        return view('crafting-material-list', [
            'materials' => $searchedMaterials,
            'materialsInventories' => MaterialsInventory::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function craftAchievement(Request $request){
        $id = $request->achievement_id;
        $uid = auth()->user()->id;
        $achievement = Achievement::find($id);
        $achievementMtls = DB::table('achievement_mtls')->where('achievement_id', $id)->get();
        $userInventories = DB::table('materials_inventories')->where('user_id', $uid)->get();
        $hasRequired = true;

        $achievementMtlsCollection = collect($achievementMtls)->where('achievement_id', $achievement->id)->all();
        foreach($achievementMtlsCollection as $recipe){
            $userInven = collect($userInventories)->where('material_id', $recipe->material_id)->all();
            foreach($userInven as $inven){
                if($inven->material_qty < $recipe->material_qty)
                    $hasRequired = false;
            }
        }

        if(!$hasRequired){
            return 0;
        }

        foreach($achievementMtlsCollection as $recipe){
            $affectedUserInventories = DB::table('materials_inventories')->where('user_id', $uid)->where('material_id', $recipe->material_id)->decrement('material_qty', $recipe->material_qty);
            $theMaterial = Material::find($recipe->material_id);
            $writeHistoryItem = DB::table('history_logs')->insert([
                'type' => 0,
                'user_id' => $uid,
                'message' => 'You have used ' . $recipe->material_qty . ' ' . $theMaterial->name . '(s) for crafting.',
                'date_in' => date("Y-m-d H:i:s")
            ]);
        }

        $updateUserPoints = DB::table('users')->where('id', $uid)->increment('points', $achievement->points);

        $userAchievementInven = DB::table('achievements_inventories')->where('user_id', $uid)->where('achievement_id', $id)->get();
        if($userAchievementInven->count() == 0){
            $createUserAchievement = DB::table('achievements_inventories')->insert([
                'user_id' => $uid,
                'achievement_id' => $id,
                'achievement_qty' => 1
            ]);
        }else{
            $updateUserAchievement = DB::table('achievements_inventories')->where('user_id', $uid)->where('achievement_id', $id)->increment('achievement_qty');
        };

        $writeHistory = DB::table('history_logs')->insert([
            'type' => 1,
            'user_id' => $uid,
            'message' => 'You have crafted the achievement \'' . $achievement->name .'\' and gained ' . $achievement->points . ' points!',
            'date_in' => date("Y-m-d H:i:s")
        ]);

        DB::table('stats')
            ->where('user_id', $uid)
            ->where('stat_item', 'Achievements claimed')
            ->increment('qty');
        DB::table('stats')
            ->where('user_id', $uid)
            ->where('stat_item', 'Points gained from claiming achievements')
            ->increment('qty', $achievement->points);
        return 1;
//        $addUserAchievement =
    }
}
