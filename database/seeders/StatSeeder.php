<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [];
        $categories = ['Items used', 'Materials/Items bought', 'Achievements claimed', 'Golds collected',
            'Mini games won', 'Points gained from claiming achievements', 'Golds gained from mini games',
            'Golds gained from item\'s effects'];
        $bonus = [3000, 4000, 5000, 6000, 7000, 0, 0, 0];

        for ($i = 1; $i < 5; $i++){
            for($ctr = 0; $ctr < 8; $ctr++){
                $records[] = [
                    'user_id'=> $i,
                    'stat_item'=> $categories[$ctr],
                    'qty'=> 0,
                    'bonus_points'=> $bonus[$ctr]
                ];
            }
        }
        DB::table('stats')->insert($records);
    }
}
