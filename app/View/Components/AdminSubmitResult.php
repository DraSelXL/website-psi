<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminSubmitResult extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $position;
    public $team;
    public $gold;
    public $material;

    public function __construct($position, $team, $gold, $material)
    {
        $this->position = $position;
        $this->team = $team;
        $this->gold = $gold;
        $this->material = $material;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin-submit-result');
    }
}
