<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrowConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grow_configs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('grow_session_id')->nullable();
            $table->tinyInteger('day_temp');
            $table->tinyInteger('night_temp');
            $table->tinyInteger('day_humd');
            $table->tinyInteger('night_humd');
            $table->tinyInteger('lg_str_hour');
            $table->tinyInteger('lg_str_min');
            $table->boolean('lg_str_medan')->default(false);
            $table->tinyInteger('lg_dur_hours');
            $table->tinyInteger('lg_dur_mins');
            $table->boolean('hourplus_mod')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grow_configs');
    }
}
