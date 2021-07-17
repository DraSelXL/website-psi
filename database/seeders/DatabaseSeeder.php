<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([MaterialSeeder::class]);
        $this->call([UserSeeder::class]);
        $this->call([AchievementSeeder::class]);
        $this->call([AchievementMtlSeeder::class]);
        $this->call([MaterialsInventorySeeder::class]);
    }
}
