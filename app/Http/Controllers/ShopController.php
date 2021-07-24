<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    function showDetailModal(Request $request){
        $material = Material::find($request->id);
        return view('material-detail-modal',[
            'material' => $material
        ]);
    }

    function purchaseMaterial(Request $request){
        $user = Auth()->user();
        $mtlID = $request->materialID;
        $mtl = Material::find($mtlID);
        $purchasedQty = $request->materialQty;
        $totalPrice = $request->totalPrice;

        if($user->gold < $totalPrice){
            return $user->gold - $totalPrice;
        }

        DB::table('materials_inventories')
            ->where('user_id', $user->id)
            ->where('material_id', $mtlID)
            ->increment('material_qty', $purchasedQty);
        DB::table('users')
            ->where('id', $user->id)
            ->decrement('gold', $totalPrice);

        DB::table('history_logs')->insert([
            'type' => 1,
            'user_id' => $user->id,
            'message' => 'You have purchased ' . $purchasedQty . ' ' . $mtl->name . '(s) for ' . $totalPrice . ' G!',
            'date_in' => date("Y-m-d H:i:s")
        ]);

        return 1;
    }
}
