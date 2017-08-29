<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('username');
            $table->string('email');
            $table->string('password');     
            $table->integer('user_type',['0','1','2'])->default(0);
            $table->string('profile_image',500)->nullable();
            $table->string('privileges',500)->nullable();
            $table->string('permission');
            $table->string('phone',250)->nullable();
            $table->string('address',500)->nullable();               
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
