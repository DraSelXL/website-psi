<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MiniGameMaterialRewards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mini_game_material_rewards', function (Blueprint $table) {
            $table->id();
            $table->integer('mini_game_id');
            $table->integer('position');
            $table->integer('material_id');
            $table->integer('percentage');
            $table->integer('cumulative');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
