<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsInventorySeeder extends Seeder
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
            'user_id'=> 3,
            'item_id'=> 1,
            'item_qty' => 3
        ];
        $records[] = [
            'user_id'=> 3,
            'item_id'=> 2,
            'item_qty' => 3
        ];
        $records[] = [
            'user_id'=> 3,
            'item_id'=> 3,
            'item_qty' => 3
        ];
        $records[] = [
            'user_id'=> 3,
            'item_id'=> 4,
            'item_qty' => 3
        ];
        $records[] = [
            'user_id'=> 3,
            'item_id'=> 5,
            'item_qty' => 3
        ];
        $records[] = [
            'user_id'=> 3,
            'item_id'=> 6,
            'item_qty' => 3
        ];

        DB::table('items_inventories')->insert($records);
    }
}
