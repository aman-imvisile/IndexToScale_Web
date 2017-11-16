<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategorySubscriptionLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('subcategory_subscription_logs', function($table){
            $table->increments('id');
            $table->integer('main_category_id');
            $table->integer('subcategory_id');
            $table->integer('user_id');
            $table->string('start_date',50);
            $table->string('enddate',50);
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcategory_subscription_logs');
    }
}
