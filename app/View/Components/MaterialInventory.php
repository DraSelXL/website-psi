<?php

namespace App\View\Components;

use App\Models\Material;
use Illuminate\View\Component;

class MaterialInventory extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $materialinvent;
    public $material;
    public $gradColor;


    public function __construct($materialinvent)
    {
        //
        $this->materialinvent = $materialinvent;
        $this->material = Material::find($materialinvent->material_id);
        $colors = [' to-green-500 ', ' to-blue-500 ', ' to-purple-600 ', ' via-gradyellowmid to-gradyellowto '];
        if($this->material->rarity < 4) $this->gradColor .= ' from-darkblue ';
        else $this->gradColor .= ' from-gradyellow ';
        $this->gradColor .= $colors[$this->material->rarity-1];

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.material-inventory',[
            'materialinvent' => $this->materialinvent,
            'material' => $this->material,
            'gradColor' => $this->gradColor
        ]);
    }
}
