<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserInfo extends Migration
{
    /**
   * Run the migrations.
   */
  public function up()
  {
      Schema::create('userInfo', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('username');
          $table->string('email')->unique();
          $table->string('password', 60);
          $table->integer('role')->default(1);
          $table->boolean('active')->default(1);
          $table->rememberToken();
          $table->timestamps();
      });
  }

  /**
   * Reverse the migrations.
   */
  public function down()
  {
      Schema::drop('userInfo');
  }
}
