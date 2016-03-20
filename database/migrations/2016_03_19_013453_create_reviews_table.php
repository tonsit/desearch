<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('seller_id');
            $table->foreign('seller_id')
                    ->references('id')->on('sellers')
                    ->onDelete('cascade');
            $table->string('name');
            $table->string('description');
            $table->integer('rating');
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
        Schema::drop('reviews');
    }
}
