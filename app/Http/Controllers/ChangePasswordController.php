<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    function changePass(Request $request){
        $user = Auth()->user();
        $newPass = $request->newPass;
        $confNewPass =$request->confNewPass;

        if($newPass!=$confNewPass){
            return -1;
        }
        else{
            DB::table('users')
                    ->where('id',$user->id)
                    ->update(['password'=>Hash::make($newPass)]);
            return 1;
        }
    }
}
