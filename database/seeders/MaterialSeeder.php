<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
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
            'name'=>'Bronze Sword',
            'description'=>'A sword made of bronze material. Pretty sturdy',
            'price'=>'100',
            'rarity'=>'1'
        ];

        $records[] = [
            'name'=>'Chainmail',
            'description'=>'A normal chainmail you can find at any armor shop.',
            'price'=>'150',
            'rarity'=>'1'
        ];

        $records[] = [
            'name'=>'Leather Boot',
            'description'=>'A common pair of boots used for any occasions.',
            'price'=>'100',
            'rarity'=>'1'
        ];

        $records[] = [
            'name'=>'Iron Sword',
            'description'=>'A sword made of iron. Easy to maintain',
            'price'=>'250',
            'rarity'=>'1'
        ];

        $records[] = [
            'name'=>'Platemail',
            'description'=>'An armor made of Iron. A large number of soldiers in the army use this type of armor.',
            'price'=>'250',
            'rarity'=>'1'
        ];

        $records[] = [
            'name'=>'Gilded Boots',
            'description'=>'Higher tier of leather boots. More expensive.',
            'price'=>'200',
            'rarity'=>'1'
        ];

        $records[] = [
            'name'=>'Gilded Boots',
            'description'=>'Higher tier of leather boots. More expensive.',
            'price'=>'200',
            'rarity'=>'1'
        ];

        $records[] = [
            'name'=>'Mithril Sword',
            'description'=>'A sword made of mithril. Highest grade metal.',
            'price'=>'400',
            'rarity'=>'2'
        ];

        $records[] = [
            'name'=>'Mithril Armor',
            'description'=>'An armor made of mithril. Highest grade metal.',
            'price'=>'400',
            'rarity'=>'2'
        ];

        $records[] = [
            'name'=>'Mithril Boots',
            'description'=>'A pair of armored boots made of mithril. Highest grade metal.',
            'price'=>'300',
            'rarity'=>'2'
        ];

        $records[] = [
            'name'=>'Oblivion Orb',
            'description'=>'An orb that contain the soul of an ancient demon. It is said that Archimonde the Defiler made this on the verge of perishing.',
            'price'=>'960',
            'rarity'=>'3'
        ];

        $records[] = [
            'name'=>'Oblivion Staff',
            'description'=>'A staff that imbued with the power of Sargeras, the Dark Titan. When the warden subjugated him, they kept this staff locked in the Tomb of Sargeras so that no one may ever wield this staff again.',
            'price'=>'1000',
            'rarity'=>'3'
        ];

        $records[] = [
            'name'=>'Golden Crown',
            'description'=>"A crown with a lot of jewels inlaid to it. It's even heavier than your usual platemail.",
            'price'=>'750',
            'rarity'=>'3'
        ];

        $records[] = [
            'name'=>'Wizard Hat',
            'description'=>'A hat used by the legendary sage, Phoena. It is passed down as the national treasure of the Alceria Kingdom.',
            'price'=>'650',
            'rarity'=>'3'
        ];

        $records[] = [
            'name'=>'Cocytus Armor',
            'description'=>'A legendary armor powered with cryo elements. Abandon hope, all ye who enters here...',
            'price'=>'1000',
            'rarity'=>'4'
        ];

        $records[] = [
            'name'=>'Excalibur',
            'description'=>'Holy sword that can erase all evil beings.',
            'price'=>'1000',
            'rarity'=>'4'
        ];

        DB::table('materials')->insert($records);
    }
}
