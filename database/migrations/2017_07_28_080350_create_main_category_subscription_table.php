<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainCategorySubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_category_subscription', function ($table) {
            $table->increments('id');
            $table->integer('main_category_id');
            $table->integer('user_id');
            $table->enum('status_type', ['0', '1']);
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
        Schema::dropIfExists('main_category_subscription');
    }
}
