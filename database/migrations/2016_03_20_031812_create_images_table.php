<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('listing_id');
            $table->foreign('listing_id')
                    ->references('id')->on('listings')
                    ->onDelete('cascade');
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
        //
    }
}
