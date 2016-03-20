<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleModelsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('vehicle_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->unsignedInteger('vehicle_make_id');
            $table->foreign('vehicle_make_id')
                   ->references('id')->on('vehicle_models')
                   ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('vehicle_models');
    }

}
