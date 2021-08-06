<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Recipe extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $bgColor;
    public $material;
    public $qty;
    public $colors = ['to-green-500 ', 'to-blue-500 ', 'to-purple-600 ', 'via-gradyellowmid to-gradyellowto '];
    public $owned;

    public function __construct($material, $qty)
    {
        $this->material = $material;
        $this->qty = $qty;
        if($this->material->rarity < 4) $this->bgColor = ' from-darkblue ';
        else $this->bgColor = ' from-gradyellow ';

        $this->bgColor .= $this->colors[$this->material->rarity-1];

        $uid = Auth::user()->id;
        $inventories = DB::table('materials_inventories')
            ->where('user_id', $uid)
            ->where('material_id', $this->material->id)
            ->first();
        if($inventories->material_qty >= $qty) $this->owned = 1;
        else $this->owned = 0;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.recipe',[
            'bgColor' => $this->bgColor,
            'owned' => $this->owned
        ]);
    }
}
