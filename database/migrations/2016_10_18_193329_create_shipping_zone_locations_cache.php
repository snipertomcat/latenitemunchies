<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingZoneLocationsCache extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_zone_locations_cache', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('location_id')->unique();
            $table->integer('zone_id');
            $table->string('location_code', 255);
            $table->string('location_type', 40);
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
        Schema::drop('shipping_zone_locations_cache');
    }
}
