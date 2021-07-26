<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ItemInventory extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $item;
    public $itemInvent;
    public $itemQuantity=0;
    public function __construct()
    {
        $this->item=$item;
        $this->itemInvent=$itemInvent;
        $itemQuantity=0;
        foreach($itemInvent as $q){
            if($q->item_id == $items->id){
                $itemQuantity = $q->item_qty;
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.item-inventory');
    }
}
