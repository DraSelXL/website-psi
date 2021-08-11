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
            'Mini games won'];
        $bonus = [3000, 4000, 5000, 6000, 7000];

        for ($i = 1; $i < 6; $i++){
            for($ctr = 0; $ctr < 5; $ctr++){
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
