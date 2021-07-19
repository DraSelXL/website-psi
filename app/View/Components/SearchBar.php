<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SearchBar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $searchBtnId;
    public $searchBarId;

    public function __construct($barId, $btnId)
    {
        $this->searchBarId = $barId;
        $this->searchBtnId = $btnId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.search-bar');
    }
}
