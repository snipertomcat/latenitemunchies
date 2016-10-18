<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemmetaCache extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_itemmeta_cache', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('meta_id');
            $table->integer('order_item_id');
            $table->string('meta_key', 255)->nullable();
            $table->longText('meta_value')->nullable();
            $table->unique(['meta_id']);
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
        Schema::drop('order_itemmeta_cache');
    }
}
