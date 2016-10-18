<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsermetaCache extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usermeta_cache', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('umeta_id')->unique()->unsigned();
            $table->integer('user_id');
            $table->string('meta_key',255)->nullable();
            $table->longText('meta_value')->nullable();
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
        Schema::drop('usermeta_cache');
    }
}
