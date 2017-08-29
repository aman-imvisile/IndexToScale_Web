<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaincategorySubscriptionLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('main_category_subscription_logs',function($table){
            $table->increments('id');
            $table->integer('main_category_id');
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
    	Schema::dropIfExists('main_category_subscription_logs');
    }
}
