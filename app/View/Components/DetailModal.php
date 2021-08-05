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
    public $object;
    public $buyFunction;
    public $finish;

    public function __construct($type, $object, $buyFunction, $finish)
    {
        $this->type = $type;
        $this->buyFunction = $buyFunction;
        $this->finish = $finish;
        $this->object = $object;
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
