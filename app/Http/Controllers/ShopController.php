<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    function showDetailModal(Request $request){
        $material = Material::find($request->id);
        return view('material-detail-modal',[
            'material' => $material
        ]);
    }
}
