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
        $records[] = [
            'user_id'=> 3,
            'material_id'=> 1,
            'material_qty'=> 1,
        ];

        $records[] = [
            'user_id'=> 3,
            'material_id'=> 2,
            'material_qty'=> 1,
        ];

        $records[] = [
            'user_id'=> 3,
            'material_id'=> 3,
            'material_qty'=> 1,
        ];

        $records[] = [
            'user_id'=> 3,
            'material_id'=> 4,
            'material_qty'=> 3,
        ];

        $records[] = [
            'user_id'=> 3,
            'material_id'=> 5,
            'material_qty'=> 1,
        ];

        $records[] = [
            'user_id'=> 3,
            'material_id'=> 6,
            'material_qty'=> 1,
        ];

        $records[] = [
            'user_id'=> 3,
            'material_id'=> 7,
            'material_qty'=> 1,
        ];

        $records[] = [
            'user_id'=> 3,
            'material_id'=> 8,
            'material_qty'=> 1,
        ];

        $records[] = [
            'user_id'=> 3,
            'material_id'=> 9,
            'material_qty'=> 1,
        ];

        $records[] = [
            'user_id'=> 3,
            'material_id'=> 10,
            'material_qty'=> 0,
        ];

        $records[] = [
            'user_id'=> 3,
            'material_id'=> 11,
            'material_qty'=> 2,
        ];

        $records[] = [
            'user_id'=> 3,
            'material_id'=> 12,
            'material_qty'=> 1,
        ];

        $records[] = [
            'user_id'=> 3,
            'material_id'=> 13,
            'material_qty'=> 0,
        ];

        $records[] = [
            'user_id'=> 3,
            'material_id'=> 14,
            'material_qty'=> 0,
        ];

        $records[] = [
            'user_id'=> 3,
            'material_id'=> 15,
            'material_qty'=> 0,
        ];

        DB::table('materials_inventories')->insert($records);
    }
}
