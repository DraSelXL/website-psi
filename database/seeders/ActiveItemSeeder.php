<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActiveItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [];

        for($i = 1; $i < 6; $i++){
            for($j = 1; $j < 8; $j++){
                $records[] = [
                    'user_id' => $i,
                    'item_id' => $j,
                    'times_left' => 0,
                    'active_status' => 0
                ];
            }
        }

        DB::table('active_items')->insert($records);
    }
}
