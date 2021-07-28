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
    public $itemsInvent;
    public $itemQuantity;
    public function __construct($item, $itemsInvent)
    {
        $this->item=$item;
        $this->itemsInvent=$itemsInvent;
        $this->itemQuantity=0;
        foreach($itemsInvent as $q){
            if($q->item_id == $item->id){
                $this->itemQuantity = $q->item_qty;
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
