<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
            'username'=>'agile',
            'name'=>'Agile',
            'password'=>Hash::make('90ksi3'),
            'gold'=>'0',
            'points'=>'0',
            'actual_points'=>'0',
            'status'=>'2'
        ];

        $records[] = [
            'username'=>'scrum',
            'name'=>'Scrum',
            'password'=>Hash::make('rv3xn5'),
            'gold'=>'0',
            'points'=>'0',
            'actual_points'=>'0',
            'status'=>'2'
        ];

        $records[] = [
            'username'=>'devops',
            'name'=>'DevOps',
            'password'=>Hash::make('ex8sic'),
            'gold'=>'0',
            'points'=>'0',
            'actual_points'=>'0',
            'status'=>'2'
        ];

        $records[] = [
            'username'=>'spiral',
            'name'=>'Spiral',
            'password'=>Hash::make('c7xrm7'),
            'gold'=>'0',
            'points'=>'0',
            'actual_points'=>'0',
            'status'=>'2'
        ];

        $records[] = [
            'username'=>'bravo6',
            'name'=>'Bravo 6',
            'password'=>Hash::make('goingdark'),
            'gold'=>'0',
            'points'=>'0',
            'actual_points'=>'0',
            'status'=>'3'
        ];

        $records[] = [
            'username'=>'mortusramen',
            'name'=>'Operator',
            'password'=>Hash::make('kepitingdipotongjadikepotong'),
            'gold'=>'69420',
            'points'=>'69420',
            'actual_points'=>'69420',
            'status'=>'1'
        ];

        DB::table('users')->insert($records);
    }
}
