<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserData extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('userData', function (Blueprint $table) {
          $table->bigInteger('id');
          $table->string('firstname')->nullable();
          $table->string('lastname')->nullable();
          $table->string('address')->nullable();
          $table->string('contact_number')->nullable();
          $table->string('birth_date')->nullable();
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('userData');
    }
}
