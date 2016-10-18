<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingZoneMethodsCache extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_zone_methods_cache', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('instance_id')->unique();
            $table->integer('zone_id');
            $table->string('method_id', 255);
            $table->integer('method_order');
            $table->tinyInteger('is_enabled');
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
        Schema::drop('shipping_zone_methods_cache');
    }
}
