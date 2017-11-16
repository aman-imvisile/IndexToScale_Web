<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('sub_categories',function($table){
            $table->increments('id');   
            $table->integer('main_category_id');
            $table->string('category_name');            
            $table->string('category_image');
            $table->integer('total_subscriptions_counts');
            $table->timestamp('created_at')->useCurrent;	
        });
    }
    
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_categories');
    }
}
