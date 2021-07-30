<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UseItemController extends Controller
{
    function useItem(Request $request){
        $user = Auth()->user();
        $itemID = $request->id;
        $itemName=$request->name;
        $itemEffect=$request->effect;
        $itemDesc = $request->desc;

        if($itemID==1){

        }
        else if($itemID==2){

        }
        else if($itemID==3){

        }
        else if($itemID==4){

        }
        else if($itemID==5){

        }
        else if($itemID==6){

        }

        DB::table('history_logs')->insert([
            'type' => 0,
            'user_id' => $user->id,
            'message' => 'You have used ' . $itemName  . ' ' .$itemEffect,
            'date_in' => date("Y-m-d H:i:s")
        ]);
    }
}
