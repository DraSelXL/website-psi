<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $name;
    public $coin;
    public $pageTitle;
    public $point;

    public function __construct($name, $coin, $pageTitle, $point)
    {
        //
        $this->name = $name;
        $this->pageTitle = $pageTitle;
        $this->point = $point;
        $this->coin = $coin;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navbar');
    }
}
