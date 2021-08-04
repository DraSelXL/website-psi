<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormrewardSingleMaterial extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $material;
    public function __construct($material)
    {
        $this->material = $material;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.formreward-single-material');
    }
}
