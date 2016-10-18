<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingZonesCache extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_zones_cache', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('zone_id')->unique();
            $table->string('zone_name',255);
            $table->integer('zone_order');
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
        Schema::drop('shipping_zones_cache');
    }
}
