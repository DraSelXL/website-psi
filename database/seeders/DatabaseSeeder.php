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
        $this->call([ItemSeeder::class]);
        $this->call([ItemsInventorySeeder::class]);
        $this->call([ActiveItemSeeder::class]);
        $this->call([StatSeeder::class]);
        $this->call([MiniGameSeeder::class]);
        $this->call([MiniGameGoldRewardSeeder::class]);
        $this->call([MiniGameMaterialRewardSeeder::class]);
        $this->call([MiscellaneousSeeder::class]);
    }
}
