<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
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
    public $activeStatus;
    public $user;

    public function __construct($item, $itemsInvent)
    {
        $user  = Auth()->user();
        $this->item=$item;
        $this->itemsInvent=$itemsInvent;
        $this->itemQuantity=0;
        foreach($itemsInvent as $q){
            if($q->item_id == $item->id){
                $this->itemQuantity = $q->item_qty;
            }
        }
        $this->activeStatus = 0;
        $activeItems = DB::table('active_items')
                            ->where('user_id',$user->id)
                            ->get();
        foreach($activeItems as $activeItem){
            if($activeItem->item_id == $item->id && $activeItem->active_status==1){
                $this->activeStatus = 1;
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
