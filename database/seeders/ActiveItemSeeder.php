<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActiveItemSeeder extends Seeder
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
            'user_id'=> 1,
            'item_id'=> 1,
            'times_left' => 0,
            'active_status' => 0
        ];

        $records[] = [
            'user_id'=> 1,
            'item_id'=> 2,
            'times_left' => 0,
            'active_status' => 0
        ];

        $records[] = [
            'user_id'=> 1,
            'item_id'=> 3,
            'times_left' => 0,
            'active_status' => 0
        ];

        $records[] = [
            'user_id'=> 1,
            'item_id'=> 4,
            'times_left' => 0,
            'active_status' => 0
        ];

        $records[] = [
            'user_id'=> 1,
            'item_id'=> 5,
            'times_left' => 0,
            'active_status' => 0
        ];

        $records[] = [
            'user_id'=> 1,
            'item_id'=> 6,
            'times_left' => 0,
            'active_status' => 0
        ];

        $records[] = [
            'user_id'=> 2,
            'item_id'=> 1,
            'times_left' => 0,
            'active_status' => 0
        ];

        $records[] = [
            'user_id'=> 2,
            'item_id'=> 2,
            'times_left' => 0,
            'active_status' => 0
        ];

        $records[] = [
            'user_id'=> 2,
            'item_id'=> 3,
            'times_left' => 0,
            'active_status' => 0
        ];

        $records[] = [
            'user_id'=> 2,
            'item_id'=> 4,
            'times_left' => 0,
            'active_status' => 0
        ];

        $records[] = [
            'user_id'=> 2,
            'item_id'=> 5,
            'times_left' => 0,
            'active_status' => 0
        ];

        $records[] = [
            'user_id'=> 2,
            'item_id'=> 6,
            'times_left' => 0,
            'active_status' => 0
        ];

        $records[] = [
            'user_id'=> 3,
            'item_id'=> 1,
            'times_left' => 0,
            'active_status' => 0
        ];

        $records[] = [
            'user_id'=> 3,
            'item_id'=> 2,
            'times_left' => 0,
            'active_status' => 0
        ];

        $records[] = [
            'user_id'=> 3,
            'item_id'=> 3,
            'times_left' => 0,
            'active_status' => 0
        ];

        $records[] = [
            'user_id'=> 3,
            'item_id'=> 4,
            'times_left' => 0,
            'active_status' => 0
        ];

        $records[] = [
            'user_id'=> 3,
            'item_id'=> 5,
            'times_left' => 0,
            'active_status' => 0
        ];

        $records[] = [
            'user_id'=> 3,
            'item_id'=> 6,
            'times_left' => 0,
            'active_status' => 0
        ];

        $records[] = [
            'user_id'=> 4,
            'item_id'=> 1,
            'times_left' => 0,
            'active_status' => 0
        ];

        $records[] = [
            'user_id'=> 4,
            'item_id'=> 2,
            'times_left' => 0,
            'active_status' => 0
        ];

        $records[] = [
            'user_id'=> 4,
            'item_id'=> 3,
            'times_left' => 0,
            'active_status' => 0
        ];

        $records[] = [
            'user_id'=> 4,
            'item_id'=> 4,
            'times_left' => 0,
            'active_status' => 0
        ];

        $records[] = [
            'user_id'=> 4,
            'item_id'=> 5,
            'times_left' => 0,
            'active_status' => 0
        ];

        $records[] = [
            'user_id'=> 4,
            'item_id'=> 6,
            'times_left' => 0,
            'active_status' => 0
        ];
        DB::table('active_items')->insert($records);
    }
}
