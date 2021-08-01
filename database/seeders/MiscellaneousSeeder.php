<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MiscellaneousSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [];

        $records[] = [
            'use_item'=> 0,
            'freeze_leaderboard' => 0,
            'finish' => 0
        ];
        DB::table('miscellaneouses')->insert($records);
    }
}
