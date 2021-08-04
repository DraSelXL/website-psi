<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    function showMaterialDetailModal(Request $request){
        $material = Material::find($request->id);
        return view('material-detail-modal',[
            'material' => $material
        ]);
    }

    function showItemDetailModal(Request $request){
        $item = Item::find($request->id);
        return view('item-detail-modal',[
            'item' => $item
        ]);
    }

    function purchaseGoods(Request $request){
        $user = Auth()->user();
        $theID = $request->purchasableID;
        $reqType = $request->type;
        $goods = null;


        if($reqType == "material") $goods = Material::find($theID);
        else $goods = Item::find($theID);

        $purchasedQty = $request->materialQty;
        $totalPrice = $request->totalPrice;

        if($user->gold < $totalPrice){
            return $user->gold - $totalPrice;
        }

        if($reqType == "material")
            DB::table('materials_inventories')
                ->where('user_id', $user->id)
                ->where('material_id', $theID)
                ->increment('material_qty', $purchasedQty);
        else
            DB::table('items_inventories')
                ->where('user_id', $user->id)
                ->where('item_id', $theID)
                ->increment('item_qty', $purchasedQty);


        DB::table('users')
            ->where('id', $user->id)
            ->decrement('gold', $totalPrice);

        DB::table('history_logs')->insert([
            'type' => 1,
            'user_id' => $user->id,
            'message' => 'You have purchased ' . $purchasedQty . ' ' . $goods->name . '(s) for ' . $totalPrice . ' G!',
            'item_id' => -1,
            'date_in' => date("Y-m-d H:i:s")
        ]);

        DB::table('stats')
            ->where('user_id', $user->id)
            ->where('stat_item', 'Materials/Items bought')
            ->increment('qty', $purchasedQty);

        return 1;
    }

}
