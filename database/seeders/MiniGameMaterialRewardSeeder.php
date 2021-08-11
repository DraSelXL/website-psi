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

        $materials = [[15, 10, 7, 4, 1],
            [15, 12, 9, 6, 3],
            [], [], [],
            [14, 13, 8, 5, 2],
            [],
            [15, 14, 6, 5, 4],
            [14, 11, 8, 6, 1]];

        $percentage = [[
          15 => [5, 5, 0, 0],
            10 => [15, 10, 5, 5],
            7 => [20, 15, 20, 10],
            4 => [25, 30, 30, 30],
            1 => [35, 40, 45, 55]
        ],[
            15 => [5, 5, 0, 0],
            12 => [15, 10, 5, 5],
            9 => [20, 20, 20, 10],
            6 => [25, 30, 30, 30],
            3 => [35, 35, 45, 55]
        ],
            [],[],[],
            [
                14 => [10, 5, 0, 0],
                13 => [15, 10, 5, 5],
                8 => [15, 20, 20, 15],
                5 => [25, 25, 25, 20],
                2 => [35, 40, 50, 60]
            ],
            [],
            [
                15 => [10, 5, 5, 0],
                14 => [10, 5, 0, 0],
                6 => [20, 20, 10, 5],
                5 => [30, 35, 35, 45],
                4 => [30, 35, 50, 50]
            ],
            [
                14 => [10, 5, 0, 0],
                11 => [15, 10, 5, 5],
                8 => [15, 15, 10, 10],
                6 => [25, 30, 35, 25],
                1 => [35, 40, 50, 60]
            ]
        ];


        for($i = 0; $i < count($materials); $i++){
            if(count($materials[$i]) > 0){
                for($pos = 0; $pos < 4; $pos++){
                    $acc = 0;
                    for($mtl = 0; $mtl < count($materials[$i]); $mtl++){
                        $acc += $percentage[$i][$materials[$i][$mtl]][$pos];
                        $records[] = [
                            'mini_game_id' => $i + 1,
                            'position' => $pos + 1,
                            'material_id' => $materials[$i][$mtl],
                            'percentage' => $percentage[$i][$materials[$i][$mtl]][$pos],
                            'cumulative' => $acc
                        ];
                    }
                }
            }
        }

        DB::table('mini_game_material_rewards')->insert($records);
    }
}
