<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MiniGameGoldRewardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [];
        $rewards = [[1100, 800, 500, 400],
            [1100, 800, 500, 350],
            [], [], [],
            [1200, 800, 650, 550],
            [],
            [1100, 800, 700, 550],
            [1000, 700, 600, 400]];

        for($i = 0; $i < count($rewards); $i++){
            if(count($rewards[$i]) > 0){
                for($j = 0; $j < count($rewards[$i]); $j++){
                    $records[] = [
                        'mini_game_id' => $i + 1,
                        'position' => $j + 1,
                        'qty' => $rewards[$i][$j]
                    ];
                }
            }
        }

        DB::table('mini_game_gold_rewards')->insert($records);
    }
}
