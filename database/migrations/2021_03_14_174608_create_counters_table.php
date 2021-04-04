<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counters', function (Blueprint $table) {
            $table->id();
            //$table->string('topic');
            //$table->smallInteger('message');
            
            $table->smallInteger('tmp');
            $table->smallInteger('hum');
            $table->boolean('lg');
            $table->boolean('fhumU');
            $table->smallInteger('humU');
            $table->boolean('fheatU');
            $table->smallInteger('heatU');
            $table->smallInteger('exfan');
            
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
        Schema::dropIfExists('counters');
    }
}
