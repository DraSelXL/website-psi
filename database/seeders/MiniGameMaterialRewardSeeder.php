<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MiniGameMaterialRewardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [];
        $mtlID = [15, 13, 9, 1, 2];
        $percentage = [[10, 15, 15, 30, 30], [5, 10, 25, 30, 30], [0, 10, 20, 35, 35], [0, 0, 10, 45, 45]];
        $cumulative = [[10, 25, 40, 70, 100], [5, 15, 40, 70, 100], [0, 10, 30, 65, 100], [0, 0, 10, 55, 100]];
        for($i = 1; $i < 10; $i++){
            for($j = 1; $j < 5; $j++){
                for($k = 0; $k < 5; $k++){
                    $records[] = [
                        'mini_game_id' => $i,
                        'position' => $j,
                        'material_id' => $mtlID[$k],
                        'percentage' => $percentage[$j-1][$k],
                        'cumulative' => $cumulative[$j-1][$k]
                    ];
                }
            }
        }
//      /*NOTE: This is a temporary reward's percentage*/
        DB::table('mini_game_material_rewards')->insert($records);
    }
}
