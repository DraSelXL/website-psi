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
            'username'=>'crystal',
            'name'=>'Crystal',
            'password'=>Hash::make('dummy'),
            'gold'=>'10000',
            'points'=>'90',
            'actual_points'=>'90',
            'status'=>'2'
        ];

        $records[] = [
            'username'=>'django',
            'name'=>'Django',
            'password'=>Hash::make('dummy'),
            'gold'=>'50000',
            'points'=>'100',
            'actual_points'=>'100',
            'status'=>'2'
        ];

        $records[] = [
            'username'=>'swift',
            'name'=>'Swift',
            'password'=>Hash::make('dummy'),
            'gold'=>'3000',
            'points'=>'200',
            'actual_points'=>'200',
            'status'=>'2'
        ];

        $records[] = [
            'username'=>'elixir',
            'name'=>'Elixir',
            'password'=>Hash::make('dummy'),
            'gold'=>'3000',
            'points'=>'200',
            'actual_points'=>'200',
            'status'=>'2'
        ];

        $records[] = [
            'username'=>'admin',
            'name'=>'Mortus Ramen',
            'password'=>Hash::make('admin'),
            'gold'=>'69420',
            'points'=>'69420',
            'actual_points'=>'69420',
            'status'=>'1'
        ];

        DB::table('users')->insert($records);
    }
}
