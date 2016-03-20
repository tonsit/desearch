<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sellers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',75);
            $table->string('type',75);
            $table->string('address_street',150);
            $table->string('address_city',75);
            $table->string('address_state',2);
            $table->string('phone',12);
            $table->string('email',75)->unique();
            $table->string('website',75)->nullable();
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
        Schema::drop('sellers');
    }
}
