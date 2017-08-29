<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategorySubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('subcategory_subscription',function($table){
        		$table->increments('id');
        		$table->integer('main_category_id');
        		$table->integer('subcategory_id');
        		$table->integer('user_id');
        		$table->enum('status_type', ['0', '1']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::dropifExists('subcategory_subscription');
    }
}
