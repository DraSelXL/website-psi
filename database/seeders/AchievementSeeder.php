<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records=[];

        $records[] = [
            'name'=>'Getting Started',
            'points'=> 500
        ];

        $records[] = [
            'name'=>'Average Guy',
            'points'=> 1000
        ];

        $records[] = [
            'name'=>'Big Shot',
            'points'=> 1500
        ];

        $records[] = [
            'name'=>'Sword Collector',
            'points'=> 1900
        ];

        $records[] = [
            'name'=>'Oblivion Set',
            'points'=> 2000
        ];

        $records[] = [
            'name'=>'Another Spare, Please?',
            'points'=> 800
        ];

        $records[] = [
            'name'=>'A King Needs His Crown',
            'points'=> 1200
        ];

        $records[] = [
            'name'=>'Fallen Witch',
            'points'=> 1200
        ];

        $records[] = [
            'name'=>'Jack of All Trades',
            'points'=> 1000
        ];

        $records[] = [
            'name'=>'Undefeated Warrior',
            'points'=> 2200
        ];

        $records[] = [
            'name'=>'Overgeared...',
            'points'=> 3000
        ];
        DB::table('achievements')->insert($records);
    }
}
