<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersCache extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_cache', function(Blueprint $table) {
            $table->increments('cache_id');
            $table->integer('id')->unique();
            $table->string('user_login',60);
            $table->string('user_pass',255);
            $table->string('user_nicename',50);
            $table->string('user_email', 100);
            $table->string('user_url', 100);
            $table->dateTime('user_registered')->default('0000-00-00');
            $table->string('user_activation_key', 255);
            $table->integer('user_status');
            $table->string('display_name',250);
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
        Schema::drop('users_cache');
    }
}
