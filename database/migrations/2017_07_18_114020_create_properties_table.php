<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->unsigned();
            $table->integer('main_category_id')->unsigned();  
            $table->integer('sub_category_id')->unsigned();            
            $table->string('property_name');
            $table->string('latitude');
            $table->string('longitude');          
            $table->integer('street_number');
            $table->string('street_name');
            $table->string('city');          
            $table->string('area');
            $table->string('address');
            $table->string('country');          
            $table->string('image');
            $table->text('approx_geo');
            $table->string('neighbourhood');          
            $table->tinyInteger('num_baths');         
            $table->tinyInteger('num_beds');         
            $table->tinyInteger('floor_area_meters');         
            $table->tinyInteger('amenities');         
            $table->tinyInteger('transport');         
            $table->tinyInteger('interior');         
            $table->tinyInteger('exterior');         
            $table->tinyInteger('floor_area');         
            $table->tinyInteger('privacy');         
            $table->tinyInteger('area_safety');         
            $table->tinyInteger('prestige');         
            $table->tinyInteger('lot');         
            $table->tinyInteger('views');         
            $table->tinyInteger('seaside');         
            $table->tinyInteger('riverside');        
            $table->tinyInteger('internet_speed');
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
        Schema::dropIfExists('properties');
    }
}
