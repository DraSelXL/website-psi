<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MiniGameSeeder extends Seeder
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
            'name'=> 'Bisa Jadi',
            'status' => 1
        ];
        $records[] = [
            'name'=> 'Flag Game',
            'status' => 1
        ];
        $records[] = [
            'name'=> 'Math Chess',
            'status' => 0
        ];
        $records[] = [
            'name'=> 'Bingo Chain Words',
            'status' => 0
        ];
        $records[] = [
            'name'=> 'Hangman',
            'status' => 0
        ];
        $records[] = [
            'name'=> 'Simon Story',
            'status' => 1
        ];
        $records[] = [
            'name'=> 'Lip Reading',
            'status' => 0
        ];
        $records[] = [
            'name'=> 'Draw a Story',
            'status' => 1
        ];
        $records[] = [
            'name'=> 'SUS',
            'status' => 1
        ];
        DB::table('mini_games')->insert($records);
    }
}
