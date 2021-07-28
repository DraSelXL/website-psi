<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class TeamSelect extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $label;
    public $selectName;
    public $teams;

    public function __construct($label, $selectName)
    {
        $this->label = $label;
        $this->selectName = $selectName;
        $this->teams = DB::table('users')->where('status',2)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.team-select');
    }
}
