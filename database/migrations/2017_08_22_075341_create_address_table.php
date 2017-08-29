<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->unsigned();
            $table->integer('state_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->string('latitude');
            $table->string('longitude');           
            $table->string('street_number');
            $table->string('street_name');
            $table->string('pincode');
            $table->string('area');
            $table->string('address');
            $table->timestamps('created_at');	
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
    }
}
