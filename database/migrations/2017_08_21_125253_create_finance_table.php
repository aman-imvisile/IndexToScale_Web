<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('finance',function($table){
            $table->increments('id');   
            $table->enum('finance_type', ['Subscription packages','Pay Per Click Rate','indexing money for users']);
            $table->string('title');
            $table->integer('price');
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
        Schema::dropIfExists('finance');
    }
}
