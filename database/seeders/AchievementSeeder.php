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
            'points'=> 550,
            'src' => 'https://i.ibb.co/ydrbN1Z/Getting-Started.jpg'
        ];

        $records[] = [
            'name'=>'Average Guy',
            'points'=> 900,
            'src' => 'https://i.ibb.co/YQx8Fdq/Average.jpg'
        ];

        $records[] = [
            'name'=>'Big Shot',
            'points'=> 1400,
            'src' => 'https://i.ibb.co/0GjzmZN/BigShot.jpg'
        ];

        $records[] = [
            'name'=>'Sword Collector',
            'points'=> 2200,
            'src' => 'https://i.ibb.co/3Nsqwkv/Sword-Collectors.jpg'
        ];

        $records[] = [
            'name'=>'Oblivion Set',
            'points'=> 1800,
            'src' => 'https://i.ibb.co/mzWkZ2s/Oblivion-Set.jpg'
        ];

        $records[] = [
            'name'=>'Another Spare, Please?',
            'points'=> 1200,
            'src' => 'https://i.ibb.co/k5GhFyz/Another-Spare-Please.jpg'
        ];

        $records[] = [
            'name'=>'A King Needs His Crown',
            'points'=> 1500,
            'src' => 'https://i.ibb.co/gmkMqgV/King.jpg'
        ];

        $records[] = [
            'name'=>'Fallen Witch',
            'points'=> 2000,
            'src' => 'https://i.ibb.co/6Hfhxfb/Fallen-Witch.jpg'
        ];

        $records[] = [
            'name'=>'Jack of All Trades',
            'points'=> 2100,
            'src' => 'https://i.ibb.co/1727FkZ/Jack-Of-All-Trade.jpg'
        ];

        $records[] = [
            'name'=>'Undefeated Warrior',
            'points'=> 2600,
            'src' => 'https://i.ibb.co/P1tvyLg/Undefeated-Warrior.jpg'
        ];

        $records[] = [
            'name'=>'Overgeared...',
            'points'=> 3500,
            'src' => 'https://i.ibb.co/whHtq8c/Overgeared.jpg'
        ];
        DB::table('achievements')->insert($records);
    }
}
