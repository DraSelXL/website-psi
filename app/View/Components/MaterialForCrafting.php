<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MaterialForCrafting extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $materialsInventory;
    public $material;
    public $idx;

    public function __construct($material, $materialsInventory, $idx)
    {
        $this->material = $material;
        $this->materialsInventory = $materialsInventory;
        $this->idx = $idx->iteration-1;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.material-for-crafting');
    }

    public function materialQty($mtl){
        return collect($this->materialsInventory)->where('material_id', $mtl->id)->all();
    }
}
