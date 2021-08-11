<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialsInventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [];
        for($i = 0; $i < 5; $i++){
            for($j = 0; $j < 15; $j++){
                $records[] = [
                    'user_id'=> $i+1,
                    'material_id'=> $j+1,
                    'material_qty'=> 0,
                ];
            }
        }

        DB::table('materials_inventories')->insert($records);
    }
}
