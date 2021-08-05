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
            'rarity'=>'1',
            'src' => 'https://i.ibb.co/Db5Z1N7/1.png'
        ];

        $records[] = [
            'name'=>'Chainmail',
            'description'=>'A normal chainmail you can find at any armor shop.',
            'price'=>'150',
            'rarity'=>'1',
            'src' => 'https://i.ibb.co/hVsmg9c/2.png'
        ];

        $records[] = [
            'name'=>'Leather Boots',
            'description'=>'A common pair of boots used for any occasions.',
            'price'=>'100',
            'rarity'=>'1',
            'src' => 'https://i.ibb.co/QNHRQ9t/3.png'
        ];

        $records[] = [
            'name'=>'Iron Sword',
            'description'=>'A sword made of iron. Easy to maintain',
            'price'=>'250',
            'rarity'=>'1',
            'src' => 'https://i.ibb.co/THzvCmt/4.png'
        ];

        $records[] = [
            'name'=>'Platemail',
            'description'=>'An armor made of Iron. A large number of soldiers in the army use this type of armor.',
            'price'=>'250',
            'rarity'=>'1',
            'src' => 'https://i.ibb.co/3NKb8TP/5.png'
        ];

        $records[] = [
            'name'=>'Gilded Boots',
            'description'=>'Higher tier of leather boots. More expensive.',
            'price'=>'200',
            'rarity'=>'1',
            'src' => 'https://i.ibb.co/tHb6ScV/6.png'
        ];

        $records[] = [
            'name'=>'Mithril Sword',
            'description'=>'A sword made of mithril. Highest grade metal.',
            'price'=>'400',
            'rarity'=>'2',
            'src' => 'https://i.ibb.co/kmv6vh7/7.png'
        ];

        $records[] = [
            'name'=>'Mithril Armor',
            'description'=>'An armor made of mithril. Highest grade metal.',
            'price'=>'400',
            'rarity'=>'2',
            'src' => 'https://i.ibb.co/HHcKdv5/8.png'
        ];

        $records[] = [
            'name'=>'Mithril Boots',
            'description'=>'A pair of armored boots made of mithril. Highest grade metal.',
            'price'=>'300',
            'rarity'=>'2',
            'src' => 'https://i.ibb.co/nrtrjwc/9.png'
        ];

        $records[] = [
            'name'=>'Oblivion Orb',
            'description'=>'An orb that contain the soul of an ancient demon. It is said that Archimonde the Defiler made this on the verge of perishing.',
            'price'=>'960',
            'rarity'=>'3',
            'src' => 'https://i.ibb.co/gZx0nyZ/10.png'
        ];

        $records[] = [
            'name'=>'Oblivion Staff',
            'description'=>'A staff that imbued with the power of Sargeras, the Dark Titan. When the warden subjugated him, they kept this staff locked in the Tomb of Sargeras so that no one may ever wield this staff again.',
            'price'=>'1000',
            'rarity'=>'3',
            'src' => 'https://i.ibb.co/DWzYmbx/11.png'
        ];

        $records[] = [
            'name'=>'Golden Crown',
            'description'=>"A crown with a lot of jewels inlaid to it. It's even heavier than your usual platemail.",
            'price'=>'750',
            'rarity'=>'3',
            'src' => 'https://i.ibb.co/RPVbH0v/12.png'
        ];

        $records[] = [
            'name'=>'Wizard Hat',
            'description'=>'A hat used by the legendary sage, Phoena. It is passed down as the national treasure of the Alceria Kingdom.',
            'price'=>'650',
            'rarity'=>'3',
            'src' => 'https://i.ibb.co/25p7Dn1/13.png'
        ];

        $records[] = [
            'name'=>'Cocytus Armor',
            'description'=>'A legendary armor powered with cryo elements. Abandon hope, all ye who enters here...',
            'price'=>'1000',
            'rarity'=>'4',
            'src' => 'https://i.ibb.co/L6gj5w3/14.png'
        ];

        $records[] = [
            'name'=>'Excalibur',
            'description'=>'Holy sword that can erase all evil beings.',
            'price'=>'1000',
            'rarity'=>'4',
            'src' => 'https://i.ibb.co/rmbfzCH/15.png'
        ];

        DB::table('materials')->insert($records);
    }
}
