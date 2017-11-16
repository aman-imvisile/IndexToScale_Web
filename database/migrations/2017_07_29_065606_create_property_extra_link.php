<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyExtraLink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('property_extra_link', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->unsigned();
            $table->string('url',500)->nullable();
            $table->string('main_title')->nullable();
            $table->string('small_title')->nullable();
            $table->string('icon_image'); 
            $table->timestamps()->useCurrent();
        });
    }
    
    
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('property_extra_link');
    }
}
