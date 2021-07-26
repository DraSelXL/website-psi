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
        $qty = [500, 300, 200, 100];
        for($i = 1; $i < 10; $i++){
            for($j = 1; $j < 5; $j++){
                $records[] = [
                    'mini_game_id' => $i,
                    'position' => $j,
                    'qty' => $qty[$j-1]
                ];
            }
        }
//        NOTE: this is a temporary gold reward quantity
        DB::table('mini_game_gold_rewards')->insert($records);
    }
}
