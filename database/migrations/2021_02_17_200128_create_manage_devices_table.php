<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_devices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('unit_id');
            $table->string('device_version');
            $table->boolean('connected')->default(false);
            //$table->foreignId('user_id')->index();
            $table->foreignId('current_team_id')->nullable();
            $table->timestamp('registerd_at')->nullable();
            $table->timestamp('removed_at')->nullable();
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
        Schema::dropIfExists('manage_devices');
    }
}
