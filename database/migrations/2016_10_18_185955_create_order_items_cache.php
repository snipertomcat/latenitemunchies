<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsCache extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items_cache', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_item_id');
            $table->text('order_item_name');
            $table->string('order_item_type', 200);
            $table->integer('order_id');
            $table->unique(['order_item_id']);
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
        Schema::drop('order_items_cache');
    }
}
