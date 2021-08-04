<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
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
            'name'=>'Point Pack',
            'price'=> 300,
            'description' => 'Instant: You can use this pack to get 300 points instantly',
            'effect' => '+300 points'
        ];
        $records[] = [
            'name'=>'Gold Boost',
            'price'=> 150,
            'description' => 'Duration (1t): When under the effect of this boost, the amount of gold your team will get next match will be doubled. Gold Rush and Gold Boost cannot be activated at the same time',
            'effect' => 'Next match: Gold x2'
        ];
        $records[] = [
            'name'=>'Gold Rush',
            'price'=> 500,
            'description' => 'Duration (3t): While under the effect of this boost, the amount of gold your team will get the next 3 matches will be tripled. Gold Rush and Gold Boost cannot be activated at the same time',
            'effect' => 'Next 3 matches: Gold x3'
        ];
        $records[] = [
            'name'=>'Copycat Device',
            'price'=> 300,
            'description' => 'Duration (1t): The next time you receive a material, there is a 30%(UR) - 60%(N) chance of you receiving a copy of it',
            'effect' => 'Next match: slight possibility to receive a material copy'
        ];
        $records[] = [
            'name'=>'Balance Juice',
            'price'=> 250,
            'description' => 'Duration (3t): In the next 3 matches, convert 50% of your gold income to points income instead',
            'effect' => 'Next 3 matches: convert 50% of gold to points'
        ];
        $records[] = [
            'name'=>'Hand of Midas',
            'price'=> 150,
            'description' => 'Duration (1t): The next time you receive a material, receive X gold income instead. X is the item\'s market price',
            'effect' => 'Next match: convert the material you get into gold'
        ];
        $records[] = [
            'name'=>'Missing Substitute',
            'price'=> 500,
            'description' => 'Instant: You can use this item as a substitute for any 1 material which is required to craft an achievement (below 2000 points), but you also must have the other required materials needed to craft the achievement.',
            'effect' => '+1 selected material'
        ];

        DB::table('items')->insert($records);
    }
}
