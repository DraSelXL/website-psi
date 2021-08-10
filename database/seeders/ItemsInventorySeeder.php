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

        for ($i = 1; $i < 5; $i++){
            for($j = 1; $j < 8; $j++){
                $records[] = [
                    'user_id' => $i,
                    'item_id' => $j,
                    'item_qty' => 0
                ];
            }
        }
        DB::table('items_inventories')->insert($records);
    }
}
