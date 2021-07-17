<?php

namespace App\View\Components;

use App\Models\Material;
use Illuminate\View\Component;

class AchievementForCrafting extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $achievement;
    public $achievementMtls;

    public function __construct($achievement, $achievementMtls)
    {
        $this->achievement = $achievement;
        $this->achievementMtls = $achievementMtls;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.achievement-for-crafting');
    }

    public function achievementRecipe($achievement){
        return collect($this->achievementMtls)->where('achievement_id', $achievement->id)->all();
    }

    public function getMaterial($mtlId){
        return Material::find($mtlId);
    }
}
