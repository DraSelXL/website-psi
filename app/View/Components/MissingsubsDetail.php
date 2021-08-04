<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class MissingsubsDetail extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $missingMtl;
    public $achievement;

    public function __construct($achievement, $missingMtl)
    {
        //
        $this->achievement = $achievement;
        $this->missingMtl = $missingMtl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.missingsubs-detail');
    }
}
