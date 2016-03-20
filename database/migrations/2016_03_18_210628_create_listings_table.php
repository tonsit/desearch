<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('seller_id');
            $table->foreign('seller_id')
                    ->references('id')->on('sellers')
                    ->onDelete('cascade');
            $table->integer('year');
            $table->unsignedInteger('vehicle_model_id');
            $table->foreign('vehicle_model_id')
                    ->references('id')->on('vehicle_models')
                    ->onDelete('cascade');
               $table->integer('vehicle_type');
            $table->string('description',300);
            $table->integer('price');
            $table->string('meta_data',300);
            $table->string('image_file',300);
            $table->timestamps();
            $table->string('created_at_ip',45);
            $table->string('updated_at_ip',45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('listings');
    }
}
