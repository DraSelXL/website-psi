<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DetailModal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type;
    public $price;
    public $name;
    public $description;
    public $purchasableID;
    public $buyFunction;
    public $finish;

    public function __construct($type, $price, $name, $description, $purchasableID, $buyFunction, $finish)
    {
        $this->type = $type;
        $this->price = $price;
        $this->name = $name;
        $this->description = $description;
        $this->purchasableID = $purchasableID;
        $this->buyFunction = $buyFunction;
        $this->finish = $finish;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.detail-modal');
    }
}
