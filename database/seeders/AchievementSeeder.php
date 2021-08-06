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
            'points'=> 500,
            'src' => 'https://i.ibb.co/BNDqjx0/Getting-Started.png'
        ];

        $records[] = [
            'name'=>'Average Guy',
            'points'=> 1000,
            'src' => 'https://i.ibb.co/XXzv6fn/Average-Guy.png'
        ];

        $records[] = [
            'name'=>'Big Shot',
            'points'=> 1500,
            'src' => 'https://i.ibb.co/sK7H7V4/BigShot.png'
        ];

        $records[] = [
            'name'=>'Sword Collector',@psi
            'points'=> 1900,
            'src' => 'https://i.ibb.co/JjKjQ5b/Sword-Collector.png'
        ];

        $records[] = [
            'name'=>'Oblivion Set',
            'points'=> 2000,
            'src' => 'https://i.ibb.co/rwjdjgq/Oblivion.png'
        ];

        $records[] = [
            'name'=>'Another Spare, Please?',
            'points'=> 800,
            'src' => 'https://i.ibb.co/g7Qch8H/Another-Spare-Please.png'
        ];

        $records[] = [
            'name'=>'A King Needs His Crown',
            'points'=> 1200,
            'src' => 'https://i.ibb.co/FwtDGTf/AKing-Need-His-Crown.png'
        ];

        $records[] = [
            'name'=>'Fallen Witch',
            'points'=> 1200,
            'src' => 'https://i.ibb.co/QD5KmKz/Fallen-Witch.png'
        ];

        $records[] = [
            'name'=>'Jack of All Trades',
            'points'=> 1000,
            'src' => 'https://i.ibb.co/QpgPK8V/Jack-Of-All-Trade.png'
        ];

        $records[] = [
            'name'=>'Undefeated Warrior',
            'points'=> 2200,
            'src' => 'https://i.ibb.co/tP2Xvsc/Undefeated-Warrior.png'
        ];

        $records[] = [
            'name'=>'Overgeared...',
            'points'=> 3000,
            'src' => 'https://i.ibb.co/YNc1b5c/Overgeared1.png'
        ];
        DB::table('achievements')->insert($records);
    }
}
