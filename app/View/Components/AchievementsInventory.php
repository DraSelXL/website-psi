<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AchievementsInventory extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $achievement;
    public $achievementInvent;
    public $achQuantity=0;
    public function __construct($achievement, $achievementInvent)
    {
        $this->achievement=$achievement;
        $this->achievementInvent=$achievementInvent;
        $achQuantity=0;
        foreach($achievementInvent as $q){
            if($q->achievement_id == $achievement->id){
                $achQuantity = $q->achievement_qty;
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
        return view('components.achievements-inventory');
    }
}
